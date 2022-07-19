<?php

namespace App\Http\Controllers\Paliativos;

use App\Http\Controllers\Controller;
use App\Models\Listas\ListasDetalle;
use App\Models\Paliativos\BasePaliativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BasePaliativosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if ($request->ajax()) {



            $datas = BasePaliativos::orderBy('id')->get();

            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="resumen" id="' . $datas->id . '" class="resumen btn btn-app bg-success tooltipsC" title="Resumen de evolucion"  ><span class="badge bg-teal">Evolución</span><i class="fas fa-notes-medical"></i> Detalle </button>'
                        . $button = '<button type="button" name="agendar" class="agenda btn btn-app bg-warning tooltipsC" title="Clic para agendar" value="' . $datas->id . '" ><span class="badge bg-teal">Psico</span><i class="fas fa-file-medical"></i> Agendar </button>'
                        . $button = '<button type="button" name="seguimiento" class="seguimientoadd btn btn-app bg-danger tooltipsC" title="Add seguimiento" value="' . $datas->id . '" ><span class="badge bg-teal">Seguimiento</span><i class="fas fa-laptop-medical"></i> Seguimiento </button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('Paliativos.index');
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
        if ($request->ajax()) {

            $rules = array(
                'surname' => 'required',
                'fname' => 'required',
                'type_document' => 'required',
                'document' => 'required',
                'state' => 'required',
                'type' => 'required',
                'user_id' => 'required'
            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            BasePaliativos::create($request->all());

            return response()->json(['success' => 'ok']);
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paliativos\BasePaliativos  $basePaliativos
     * @return \Illuminate\Http\Response
     */
    public function edit(BasePaliativos $basePaliativos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paliativos\BasePaliativos  $basePaliativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BasePaliativos $basePaliativos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paliativos\BasePaliativos  $basePaliativos
     * @return \Illuminate\Http\Response
     */
    public function destroy(BasePaliativos $basePaliativos)
    {
        //
    }
}
