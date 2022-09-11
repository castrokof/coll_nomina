<?php

namespace App\Http\Controllers\Nomina;

use App\Http\Controllers\Controller;
use App\Models\Nomina\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        {

            if($request->ajax()){


                $datas = Position::orderBy('id')->get();
                return  DataTables()->of($datas)
                    ->addColumn('action', function($datas){
                    $button = '<button type="button" name="edit" id="'.$datas->id.'"
                    class = "edit btn btn-primary btn-sm tooltipsC"  title="Editar registro" >Editar</button>';

                    return $button;

                })
                ->rawColumns(['action'])
                ->make(true);
                    }


            return view('nomina.cargos.index');


        }  //
    }


    public function select()
    {
        if(request()->ajax())
        {
          $positions=Position::orderBy('id')->get();
            return response()->json($positions);
        }
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
                'position'  => 'required',
                'salary'  => 'required'

            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

                Position::create([
                'position'  => $request->position,
                'salary'  => $request->salary,
                'value_hour'  => $request->value_hour,
                'value_hour_add'  => $request->value_hour_add,
                'value_patient_attended' => $request->value_patient_attended,
                'value_hour_night'  => $request->value_hour_night

                ]);

                return response()->json(['success' => 'ok']);

            //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        if (request()->ajax()) {

            $data = Position::where('id', $id)->first();

            return response()->json(['result' => $data]);
        }
        return view('nomina.cargos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        $rules = array(
            'position'  => 'required|max:255',
            'salary'  => 'required',
            'value_hour'  => 'required',
            'value_hour_add',
            'value_patient_attended',
            'value_hour_night',
            'value_add_security_social'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = DB::table('position')->where('id', '=', $id)
            ->update([
                'position' => $request->position,
                'salary' => $request->salary,
                'value_hour' => $request->value_hour,
                'value_hour_add' => $request->value_hour_add,
                'value_patient_attended' => $request->value_patient_attended,
                'value_hour_night' => $request->value_hour_night,
                'value_add_security_social' => $request->value_add_security_social,
                'updated_at' => now()
            ]);
        //$data->update($request->all());
        return response()->json(['success' => 'ok1']);
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
