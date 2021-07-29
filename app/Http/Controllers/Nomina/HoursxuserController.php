<?php

namespace App\Http\Controllers\Nomina;

use App\Http\Controllers\Controller;
use App\Models\Nomina\Hoursxuser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HoursxuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {

        if($request->ajax()){

            $usuario_id = $request->session()->get('usuario_id');

            $datas = DB::table('hoursxuser')
            ->join('usuario', 'hoursxuser.user_id', '=', 'usuario.id')
            ->select('hoursxuser.id as id', 'hoursxuser.date_hour_initial_turn as date_hour_initial_turn', 'hoursxuser.date_hour_end_turn as date_hour_end_turn', 'hoursxuser.hours as hours',
            'hoursxuser.working_type as working_type', 'hoursxuser.observation as observation', 'hoursxuser.created_at as created_at')
            ->where('hoursxuser.user_id', $usuario_id)
            ->orderBy('hoursxuser.id')
            ->get();
            return  DataTables()->of($datas)
                ->addColumn('action', function($datas){
                $button = '<button type="button" name="edit" id="'.$datas->id.'"
                class = "edit btn btn-primary btn-sm tooltipsC"  title="Editar registro" ><i class="fas fa-edit"></i> Editar</button>';

                return $button;

            })
            ->rawColumns(['action'])
            ->make(true);
                }


        return view('nomina.control_turnos.index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'date_hour_initial_turn'  => 'required',
            'date_hour_end_turn'  => 'required',
            'working_type'  => 'required',
            'observation'  => 'max:100'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        //Validar que no pueda ingresar una misma turno con una misma fecha del mismo empleado

        //Variables donde se extrae solo la fecha

        $datei = new Carbon($request->date_hour_initial_turn);
        $datei = $datei->toDateString();

        $datef = new Carbon($request->date_hour_end_turn);
        $datef = $datef->toDateString();



        $existe = Hoursxuser::where([
            ['date_hour_initial_turn', 'LIKE', $datei.'%'],
            ['date_hour_end_turn', 'LIKE', $datef.'%'],
            ['user_id', $request->user_id],
            ['working_type', $request->working_type]
            ])->count();


      if($existe > 0){

             return response()->json(['success' => 'repeat']);

       }else if($datei > $datef){

            return response()->json(['errors' => ['La fecha y hora inicial debe ser menor que la fecha y hora final']]);

       }else{

         $hours = (strtotime($request->date_hour_end_turn) - strtotime($request->date_hour_initial_turn))/3600;

         Hoursxuser::create([
            'date_hour_initial_turn'  => $request->date_hour_initial_turn,
            'date_hour_end_turn'  => $request->date_hour_end_turn,
            'working_type'  => $request->working_type,
            'observation'  => $request->observation,
            'hours' => $hours,
            'user_id'  => $request->user_id,

            ]);

            return response()->json(['success' => 'ok']);

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


        if(request()->ajax()){
            $data = Hoursxuser::where('id', '=', $id)->first();
            return response()->json(['result'=>$data]);

        }


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

        $rules = array(
            'date_hour_initial_turn'  => 'required',
            'date_hour_end_turn'  => 'required',
            'working_type'  => 'required',
            'observation'  => 'max:100'
        );

        // $attributeNames = array(
        //     "date_turn" => "Fecha Reporte",
        //     "hour_initial_turn" => "Hora Ingreso",
        //     "hour_end_turn" => "Hora Salida",
        //     "working_type" => "Jornada",
        //     "observation" => "observacion"

        //     );

        $error = Validator::make($request->all(), $rules);
      //  $error->setAttributeNames($attributeNames);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $datei = new Carbon($request->date_hour_initial_turn);
        $datei = $datei->toDateString();

        $datef = new Carbon($request->date_hour_end_turn);
        $datef = $datef->toDateString();

        if($datei >= $datef){

            return response()->json(['errors' => ['La fecha y hora inicial debe ser menor que la fecha y hora final']]);

        }


        if(request()->ajax()){



            $hours = (strtotime($request->date_hour_end_turn) - strtotime($request->date_hour_initial_turn))/3600;





            Hoursxuser::findOrFail($id)
            ->update([
                'date_hour_initial_turn'  => $request->date_hour_initial_turn,
                'date_hour_end_turn'  => $request->date_hour_end_turn,
                'working_type'  => $request->working_type,
                'observation'  => $request->observation,
                'hours' => $hours,
                'user_id'  => $request->user_id,

                ]);

                return response()->json(['success' => 'ok1']);

            }

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
