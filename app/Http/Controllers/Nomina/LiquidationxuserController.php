<?php

namespace App\Http\Controllers\Nomina;
use App\Http\Controllers\Controller;
use App\Models\Nomina\Hoursxuser;
use App\Models\Seguridad\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LiquidationxuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function informes(Request $request )
    {


        if($request->ajax()){


             //Variables donde se extrae solo la fecha

        $fechaini = new Carbon($request->fechaini);
        $fechaini = $fechaini->toDateString();

        $fechafin = new Carbon($request->fechafin);
        $fechafin = $fechafin->toDateString();

            $usuario = $request->usuario;
            $quincena = $request->quincena;


            $datas = DB::table('hoursxuser')
            ->join('usuario', 'hoursxuser.user_id', '=', 'usuario.id')
            ->join('position', 'usuario.cargo_id', '=', 'position.id')

            ->select(
            DB::raw("SUM(CASE WHEN hoursxuser.working_type = 'nocturno' THEN 1 ELSE 0 END) AS turnos"),
            DB::raw("position.value_hour_night * SUM(CASE WHEN hoursxuser.working_type = 'nocturno' THEN 1 ELSE 0 END) AS total_noches"),
            DB::raw("sum(position.value_hour * hoursxuser.hours + (position.salary/2) +position.value_hour_night * CASE WHEN hoursxuser.working_type = 'nocturno' THEN 1 ELSE 0 END - ((position.salary/2) * 0.08)) as total_pagar"),
            DB::raw('sum(hoursxuser.hours) as horas'),
            'usuario.id as id','usuario.type_salary as type_salary', 'position.value_hour_night as noches', 'usuario.pnombre as pnombre', 'position.value_hour as valor_hora', DB::raw('position.value_hour * sum(hoursxuser.hours) as total'),
            'usuario.snombre as snombre', 'usuario.papellido as papellido', 'usuario.sapellido as sapellido','hoursxuser.quincena as quincena', DB::raw('position.salary / 2 as salary'), 'usuario.ips as ips', DB::raw('position.salary/2 * 0.08 as parafiscales'))
            ->where([
            ['hoursxuser.quincena', $quincena],
            ['hoursxuser.supervisor', '!=', null]])
            ->groupBy('pnombre', 'id', 'snombre', 'papellido', 'sapellido', 'quincena', 'value_hour', 'value_hour_night', 'salary', 'type_salary', 'ips', 'parafiscales')
            ->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function($datas){
                $button ='<input type="checkbox" name="case[]"  value="'.$datas->id.'" class="case btn btn-primary btn-sm tooltipsC" title="Selecciona Orden"/>';
                return $button;

            })
            ->rawColumns(['action'])
            ->make(true);



        }


        return view('nomina.liquidacion.informes.informes-liquid');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//Function para informes del supervisor widgets
public function informes1(Request $request )
{

   if($request->ajax()){

    $fechaini = new Carbon($request->fechaini);
    $fechaini = $fechaini->toDateString();

    $fechafin = new Carbon($request->fechafin);
    $fechafin = $fechafin->toDateString();

    $usuario = $request->usuario;
    $valor_hora_add = 0;

//Consulta de suma de total horas
        $datas = DB::table('hoursxuser')
        ->join('usuario', 'hoursxuser.user_id', '=', 'usuario.id')
        ->where([
        ['hoursxuser.user_id', $usuario],
        ['hoursxuser.date_hour_initial_turn', '>=', $fechaini.' 00:00:00'],
        ['hoursxuser.date_hour_initial_turn', '<=', $fechafin.' 23:59:59'],
        ['hoursxuser.supervisor', '=', null]
        ])
        ->select(DB::raw('sum(hoursxuser.hours) as horas'))
        ->get();




//Consulta de cuenta de turnos de noche
        $turn_night = DB::table('hoursxuser')
        ->join('usuario', 'hoursxuser.user_id', '=', 'usuario.id')
        ->where([
        ['hoursxuser.user_id', $usuario],
        ['hoursxuser.date_hour_initial_turn', '>=', $fechaini.' 00:00:00'],
        ['hoursxuser.date_hour_initial_turn', '<=', $fechafin.' 23:59:59'],
        ['hoursxuser.working_type', '=', 'Nocturno'],
        ['hoursxuser.supervisor', '=', null]
        ])
        ->select(DB::raw('count(hoursxuser.working_type) as turnos'))
        ->get();
//Consulta de cuenta de turnos de noche
        $turn_night1 = DB::table('hoursxuser')
        ->join('usuario', 'hoursxuser.user_id', '=', 'usuario.id')
        ->where([
        ['hoursxuser.user_id', $usuario],
        ['hoursxuser.date_hour_initial_turn', '>=', $fechaini.' 00:00:00'],
        ['hoursxuser.date_hour_initial_turn', '<=', $fechafin.' 23:59:59'],
        ['hoursxuser.working_type', '=', 'Nocturno'],
        ['hoursxuser.supervisor', '=', null]
        ])
        ->select(DB::raw('count(hoursxuser.working_type) as turnos1'))
        ->first();

//Consulta de total horas - horas base
        $horas_base = 0;
        $hours_total = DB::table('hoursxuser')
        ->join('usuario', 'hoursxuser.user_id', '=', 'usuario.id')
        ->where([
        ['hoursxuser.user_id', $usuario],
        ['hoursxuser.date_hour_initial_turn', '>=', $fechaini.' 00:00:00'],
        ['hoursxuser.date_hour_initial_turn', '<=', $fechafin.' 23:59:59'],
        ['hoursxuser.supervisor', '=', null]
        ])
        ->select(DB::raw('sum(hoursxuser.hours) as horas'))
        ->first();

        if($hours_total->horas <= 0 ){

        $horas_add = 0;

        }else if($hours_total->horas <= 96 && $hours_total->horas > 0){

        $horas_add = 0;
        $horas_base = $hours_total->horas;

        }else{

        $horas_add = $hours_total->horas - 96;
        $horas_base = $hours_total->horas - $horas_add;
        }


// validación para controlar el error de hora

        if($usuario != null){
        //Consulta para traer el valor de la hora del usuario
        $valor_hora = DB::table('usuario')
        ->join('position', 'usuario.cargo_id', '=', 'position.id')
        ->where('usuario.id', $usuario)
        ->select(DB::raw('position.value_hour as hora'))
        ->first();
         //Consulta para traer el valor del turno de noche
         $valor_turn_night = DB::table('usuario')
         ->join('position', 'usuario.cargo_id', '=', 'position.id')
         ->where('usuario.id', $usuario)
         ->select(DB::raw('position.value_hour_night as night'))
         ->first();

        //Consulta para traer la suma de total horas del usuario
        $payment = DB::table('hoursxuser')
        ->join('usuario', 'hoursxuser.user_id', '=', 'usuario.id')
        ->join('position', 'usuario.cargo_id', '=', 'position.id')
        ->where([
        ['hoursxuser.user_id', $usuario],
        ['hoursxuser.date_hour_initial_turn', '>=', $fechaini.' 00:00:00'],
        ['hoursxuser.date_hour_initial_turn', '<=', $fechafin.' 23:59:59'],
        ['hoursxuser.supervisor', '=', null]
                   ])
        ->select(DB::raw('sum(hoursxuser.hours) as sumhour'))
        ->first();

            $valor_turn_night_add = $valor_turn_night->night * $turn_night1->turnos1;

            $payment_day = ($valor_hora->hora * $payment->sumhour) + $valor_turn_night_add;
            $valor_hora_add = $valor_hora->hora;
        }else{

            $payment_day = 0;
        }




        return response()->json(['result' => $datas, 'result1' => $turn_night, 'result2' => $payment_day, 'result3' => $horas_base, 'result4' => $horas_add, 'valor_hora' => $valor_hora_add]);


      }





}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function select()
    {
        if(request()->ajax())
        {
          $quincenas=Hoursxuser::select('quincena')->groupby('quincena')->get();
            return response()->json($quincenas);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
