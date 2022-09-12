<?php

namespace App\Http\Controllers\Nomina;


use App\Events\UpdateNovedadEmp;
use App\Http\Controllers\Controller;

use App\Models\nomina\Empleados;
use App\Models\Seguridad\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario_id = $request->session()->get('usuario_id');



    if($request->ajax()){

        if($request->session()->get('rol_id') == 1){

            $datas = Empleados::orderBy('id')->get();

           return  DataTables()->of($datas)
            ->addColumn('action', function($datas){
            $button = '<button type="button" name="edit" id="'.$datas->id.'"
            class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar usuario"><i class="fas fa-user-edit"></i></button>';
            $button .='&nbsp;<button type="button" name="addnovedad" id="'.$datas->id.'" usuario1="'.$datas->usuario.'"
            class = "addnovedad btn-float  bg-gradient-warning btn-sm tooltipsC" title="Adicionar novedad"><i class="fas fa-plus-square"></i></button>';

          return $button;

            })
            ->rawColumns(['action'])
            ->make(true);

         }else  if($request->session()->get('rol_id') == 2){

            $datas = Empleados::orderBy('id')
            ->where('user_id',  $usuario_id )
            ->get();

        return  DataTables()->of($datas)
        ->addColumn('action', function($datas){
        $button = '<button type="button" name="edit" id="'.$datas->id.'"
        class = "edit btn-float  bg-gradient-primary btn-sm tooltipsC"  title="Editar usuario"><i class="fas fa-user-edit"></i></button>';
        $button .='&nbsp;<button type="button" name="editpass" id="'.$datas->id.'"
        class = "epassword btn-float  bg-gradient-warning btn-sm tooltipsC" title="Editar password"><i class="fas fa-plus-square"></i></button>';
        return $button;

          })
          ->rawColumns(['action'])
          ->make(true);

        }


    }

        return view('nomina.empleados.index');
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
    public function store(Request $request, Empleados $empleados)
    {

        $rules = array(
            'monto'  => 'numeric|required|min:1|max:9999999999',
            'descripcion'  => 'required|max:150'

        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

            Empleados::create($request->all());

            event(new UpdateNovedadEmp($empleados));

            return response()->json(['success' => 'ok']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nomina\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nomina\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleados $empleados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nomina\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleados $empleados)
    {





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nomina\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleados $empleados)
    {
        //
    }
}
