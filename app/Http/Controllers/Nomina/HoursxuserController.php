<?php

namespace App\Http\Controllers\Nomina;

use App\Http\Controllers\Controller;
use App\Models\Nomina\Hoursxuser;
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
            ->select('hoursxuser.id as id', 'hoursxuser.date_turn as date_turn', 'hoursxuser.hour_initial_turn as hour_initial_turn', 'hoursxuser.hour_end_turn as hour_end_turn', 'hoursxuser.hours as hours',
            'hoursxuser.working_type as working_type', 'hoursxuser.observation as observation', 'hoursxuser.created_at as created_at')
            ->where('hoursxuser.user_id', $usuario_id)
            ->orderBy('hoursxuser.id')
            ->get();
            return  DataTables()->of($datas)
                ->addColumn('action', function($datas){
                $button = '<button type="button" name="edit" id="'.$datas->id.'"
                class = "edit btn btn-primary btn-sm tooltipsC"  title="Editar registro" >Editar</button>';

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
            'date_turn'  => 'date|required',
            'hour_initial_turn'  => 'required',
            'hour_end_turn'  => 'required',
            'working_type'  => 'required',
            'observation'  => 'max:100'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }



        if((strtotime($request->hour_end_turn) - strtotime($request->hour_initial_turn))/3600 < 0){

            $hours = (strtotime($request->hour_end_turn) - strtotime($request->hour_initial_turn))/3600 *-1;

        }else{

            $hours = (strtotime($request->hour_end_turn) - strtotime($request->hour_initial_turn))/3600;

            }
        Hoursxuser::create([
            'date_turn' =>  $request->date_turn,
            'hour_initial_turn'  => $request->hour_initial_turn,
            'hour_end_turn'  => $request->hour_end_turn,
            'working_type'  => $request->working_type,
            'observation'  => $request->observation,
            'hours' => $hours,
            'user_id'  => $request->user_id,

            ]);

            return response()->json(['success' => 'ok']);
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
            'date_turn'  => 'date|required',
            'hour_initial_turn'  => 'required',
            'hour_end_turn'  => 'required',
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


        if(request()->ajax()){

            if((strtotime($request->hour_end_turn) - strtotime($request->hour_initial_turn))/3600 < 0){

                $hours = (strtotime($request->hour_end_turn) - strtotime($request->hour_initial_turn))/3600 *-1;

            }else{

                $hours = (strtotime($request->hour_end_turn) - strtotime($request->hour_initial_turn))/3600;

                }



            Hoursxuser::findOrFail($id)
            ->update([
                'date_turn' =>  $request->date_turn,
                'hour_initial_turn'  => $request->hour_initial_turn,
                'hour_end_turn'  => $request->hour_end_turn,
                'working_type'  => $request->working_type,
                'observation'  => $request->observation,
                'hours' => $hours,
                'user_id'  => $request->user_id,

                ]);

            }
            return response()->json(['success' => 'ok1']);
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
