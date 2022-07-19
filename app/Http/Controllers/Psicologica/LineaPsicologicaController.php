<?php

namespace App\Http\Controllers\Psicologica;

use App\Http\Controllers\Controller;
use App\Models\Psicologica\LineaPsicologica;
use App\Models\Seguridad\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class LineaPsicologicaController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $usuario_id = $request->session()->get('usuario_id');

            $datas = DB::table('psicologica')
                ->join('usuario', 'psicologica.user_id', '=', 'usuario.id')
                ->select(
                    'psicologica.id',
                    'psicologica.surname',
                    'psicologica.ssurname',
                    'psicologica.fname',
                    'psicologica.sname',
                    'psicologica.type_document',
                    'psicologica.document',
                    'psicologica.date_birth',
                    'psicologica.municipality',
                    'psicologica.other',
                    'psicologica.address',
                    'psicologica.celular',
                    'psicologica.phone',
                    'psicologica.email',
                    'psicologica.sex',
                    'psicologica.eapb',
                    'psicologica.reason_consultation',
                    'psicologica.consultation',
                    'psicologica.diagnosis',
                    'psicologica.user_id',
                    'psicologica.created_at'
                )
                ->where([
                    ['psicologica.user_id', $usuario_id]
                ])
                ->orderBy('psicologica.created_at')
                ->get();
            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="resumen" id="' . $datas->id . '" class="resumen btn btn-app bg-success tooltipsC" title="Resumen de evolucion"  ><span class="badge bg-teal">Evolución</span><i class="fas fa-notes-medical"></i> Detalle </button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('lineaPsicologica.index');
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
            'surname' => 'required',
            'fname' => 'required',
            'type_document' => 'required',
            'document' => 'numeric|required|min:9999|max:99999999999',
            'date_birth' => 'required',
            'municipality' => 'required',
            'address' => 'required',
            'celular' => 'required|max:100',
            'phone' => 'required|max:100',
            'sex' => 'required',
            'eapb' => 'required',
            'reason_consultation' => 'required',
            'consultation' => 'required'

        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        LineaPsicologica::create($request->all());

        return response()->json(['success' => 'ok']);

        //
    }

    // función para enviar los datos filtrados y pintar los botones del index de analista linea psicologica

    public function indexAnalista(Request $request)
    {

        if ($request->ajax()) {

            $usuario_id = $request->session()->get('usuario_id');

            $datas = DB::table('psicologica')
                ->join('usuario', 'psicologica.user_id', '=', 'usuario.id')
                ->select(
                    'psicologica.id',
                    'psicologica.surname',
                    'psicologica.ssurname',
                    'psicologica.fname',
                    'psicologica.sname',
                    'psicologica.type_document',
                    'psicologica.document',
                    'psicologica.date_birth',
                    'psicologica.municipality',
                    'psicologica.other',
                    'psicologica.address',
                    'psicologica.celular',
                    'psicologica.phone',
                    'psicologica.email',
                    'psicologica.sex',
                    'psicologica.eapb',
                    'psicologica.reason_consultation',
                    'psicologica.consultation',
                    'psicologica.diagnosis',
                    'psicologica.user_id',
                    'psicologica.created_at'
                )
                ->where([
                    ['psicologica.consultation', 1],
                    ['psicologica.future5', null]
                ])
                ->orderBy('psicologica.created_at')
                ->get();
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


        return view('lineaPsicologica.indexAnalista');
    }

    // función para enviar los datos filtrados y pintar los botones del index de agendado en analista

    public function indexAnalistaa(Request $request)
    {

        if ($request->ajax()) {

            $usuario_id = $request->session()->get('usuario_id');

            $datas = DB::table('psicologica')
                ->join('usuario', 'psicologica.user_id', '=', 'usuario.id')
                ->select(
                    'psicologica.id',
                    'psicologica.surname',
                    'psicologica.ssurname',
                    'psicologica.fname',
                    'psicologica.sname',
                    'psicologica.type_document',
                    'psicologica.document',
                    'psicologica.date_birth',
                    'psicologica.municipality',
                    'psicologica.other',
                    'psicologica.address',
                    'psicologica.celular',
                    'psicologica.phone',
                    'psicologica.email',
                    'psicologica.sex',
                    'psicologica.eapb',
                    'psicologica.reason_consultation',
                    'psicologica.consultation',
                    'psicologica.diagnosis',
                    'psicologica.user_id',
                    'psicologica.created_at'
                )
                ->where([
                    ['psicologica.consultation', 1],
                    ['psicologica.future5', 1]
                ])
                ->orderBy('psicologica.created_at')
                ->get();
            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="resumen" id="' . $datas->id . '" class="resumen btn btn-app bg-success tooltipsC" title="Resumen de evolucion"  ><span class="badge bg-teal">Evolución</span><i class="fas fa-notes-medical"></i> Detalle </button>';
                    return $button;
                })
                ->addColumn('actions', function ($datas) {
                    //$button ='<button type="button" name="agendar" value="'.$datas->id.'" class="agenda btn btn-danger tooltipsC" title="Clic desagendar" ><i class="fas fa-file-medical-alt fa-2x"></i></button>';
                    $button = '<button type="button" class="agenda btn btn-app bg-danger tooltipsC" title="Clic para desagendar"  value="' . $datas->id . '" ><span class="badge bg-teal">Psico</span><i class="fas fa-brain"></i> Agendada </button>';

                    return $button;
                })
                ->rawColumns(['action', 'actions'])
                ->make(true);
        }


        return view('lineaPsicologica.indexAnalista');
    }

    // función para enviar los datos filtrados y pintar los botones del index de seguimiento en analista

    public function indexAnalistas(Request $request)
    {

        if ($request->ajax()) {

            $usuario_id = $request->session()->get('usuario_id');

            $datas = DB::table('psicologica')
                ->join('usuario', 'psicologica.user_id', '=', 'usuario.id')
                ->select(
                    'psicologica.id',
                    'psicologica.surname',
                    'psicologica.ssurname',
                    'psicologica.fname',
                    'psicologica.sname',
                    'psicologica.type_document',
                    'psicologica.document',
                    'psicologica.date_birth',
                    'psicologica.municipality',
                    'psicologica.other',
                    'psicologica.address',
                    'psicologica.celular',
                    'psicologica.phone',
                    'psicologica.email',
                    'psicologica.sex',
                    'psicologica.eapb',
                    'psicologica.reason_consultation',
                    'psicologica.consultation',
                    'psicologica.diagnosis',
                    'psicologica.user_id',
                    'psicologica.created_at'
                )
                ->where([
                    ['psicologica.consultation', 1],
                    ['psicologica.future5', 2]
                ])
                ->orderBy('psicologica.created_at')
                ->get();
            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="observacion" class="observacion btn btn-app bg-info tooltipsC" title="Add Observación" value="' . $datas->id . '" ><span class="badge bg-teal">Add+</span><i class="fa fa-plus-circle"></i> Add Obs</button>'
                        . $button = '<button type="button" name="resumen" id="' . $datas->id . '" class="resumen btn btn-app bg-success tooltipsC" title="Resumen de evolucion"  ><span class="badge bg-teal">Evolución</span><i class="fas fa-notes-medical"></i> Detalle </button>'
                        . $button = '<button type="button" name="agendar" class="agenda btn btn-app bg-warning tooltipsC" title="Clic para agendar" value="' . $datas->id . '" ><span class="badge bg-teal">Psico</span><i class="fas fa-file-medical"></i> Agendar </button>';
                    return $button;
                })

                ->rawColumns(['action'])
                ->make(true);
        }


        return view('lineaPsicologica.indexAnalista');
    }


    public function detalleEvolucion($id)
    {
        if (request()->ajax()) {


            $data = Usuario::with('roles1')->get();
            //  $detalleEvo = DB::table('psicologica')
            //  ->rightjoin('obspsicologia', 'psicologica.id', '=', 'obspsicologia.user_id')
            //  ->where([['psicologica.id', '=', $id]])->get();

            $detalleEvo = LineaPsicologica::with('observacionadd')->findOrFail($id);


            return response()->json([['evolucion' => $detalleEvo], ['usuario' => $data]]);
        }
    }



    public function addseguimiento($id)
    {
        if (request()->ajax()) {

            $detallename = DB::table('psicologica')
                ->where('id', '=', $id)->get();

            return response()->json(['add' => $detallename]);
        }
    }


    public function agendadoEvolucion(Request $request)
    {
        if ($request->ajax()) {

            $agenda = new LineaPsicologica();

            $datas = DB::table('psicologica')->select('future5')->where('id', $request->input('id'))->first();


            foreach ($datas as $data) {

                if ($data == null || $data == 2) {

                    $agenda->findOrFail($request->input('id'))->update([
                        'future5' => 1
                    ]);

                    return response()->json(['respuesta' => 'Cita agendada correctamente', 'titulo' => 'Control turnos', 'icon' => 'success']);
                } else if ($data == 1) {
                    $agenda->findOrFail($request->input('id'))->update([
                        'future5' => null
                    ]);

                    return response()->json(['respuesta' => 'Cita desagendada correctamente', 'titulo' => 'Control turnos', 'icon' => 'warning']);
                }
            }
        }
    }


    public function indexava(Request $request)
    {

        if ($request->ajax()) {
        }

        return view('ambienteAva.index');
    }


    public function informePsico(Request $request)
    {

        $fechaAi = $request->fechaini." 00:00:01";
        $fechaAf = $request->fechafin." 23:59:59";


        $fecha_Actual = Carbon::now();
        $fecha_Actual = $fecha_Actual->Format('Y-m-d');

        $data = Usuario::with('roles1')->get();

        if ($request->ajax()) {

            $datas = DB::table('psicologica')->join('usuario', 'psicologica.user_id', '=', 'usuario.id')
                ->select(
                    'psicologica.id',
                    'psicologica.surname',
                    'psicologica.ssurname',
                    'psicologica.fname',
                    'psicologica.sname',
                    'psicologica.type_document',
                    'psicologica.document',
                    'psicologica.date_birth',
                    'psicologica.municipality',
                    'psicologica.other',
                    'psicologica.address',
                    'psicologica.celular',
                    'psicologica.phone',
                    'psicologica.email',
                    'psicologica.sex',
                    'psicologica.eapb',
                    'psicologica.reason_consultation',
                    'psicologica.consultation',
                    'psicologica.diagnosis',
                    'usuario.usuario',
                    'psicologica.created_at'
                )
                ->whereBetween('psicologica.created_at', [$fechaAi, $fechaAf])
                ->orderBy('psicologica.created_at')
                ->get();
            return  DataTables()->of($datas)
                ->addColumn('action', function ($datas) {
                    $button = '<button type="button" name="resumen" id="' . $datas->id . '" class="resumen btn btn-app bg-success tooltipsC" title="Resumen de evolucion"  ><span class="badge bg-teal">Evolución</span><i class="fas fa-notes-medical"></i> Detalle </button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true)
                ;

                return response()->json(['usuario' => $data]);
        }


        return view('lineaPsicologica.indexInforme');
    }
}
