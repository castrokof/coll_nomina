@extends("theme.$theme.layout")

@section('titulo')
    Informes
@endsection

@section('styles')
    <link href="{{ asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css") }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />



    <style>
        /* // Colores para las tarjetas widget */
        .card {
            background-color: #fff;
            border-radius: 10px;
            border: none;
            position: relative;
            margin-bottom: 30px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
        }

        .l-bg-blue-dark-card {
            background-color: linear-gradient(to right, #373b44, #4286f4) !important;
            color: #fff;
        }



        .l-bg-cherry {
            background: linear-gradient(to right, #493240, #f09) !important;
            color: #fff;
        }

        .l-bg-blue-dark {
            background: linear-gradient(to right, #373b44, #4286f4) !important;
            color: #fff;
        }

        .l-bg-blued-dark {
            background: linear-gradient(to right, #0d182f, #0d61e9) !important;
            color: #fff;
        }

        .l-bg-green-dark {
            background: linear-gradient(to right, #0a504a, #38ef7d) !important;
            color: #fff;
        }

        .l-bg-orange-dark {
            background: linear-gradient(to right, #a86008, #ffba56) !important;
            color: #fff;
        }

        .l-bg-red-dark {
            background: linear-gradient(to right, #a80d08, #ff6756) !important;
            color: #fff;
        }

        .l-bg-yellow-dark {
            background: linear-gradient(to right, #c6d106, #9b9107) !important;
            color: #fff;
        }

        .card .card-statistic-3 .card-icon-large .fas,
        .card .card-statistic-3 .card-icon-large .far,
        .card .card-statistic-3 .card-icon-large .fab,
        .card .card-statistic-3 .card-icon-large .fal {
            font-size: 110px;
        }

        .card .card-statistic-3 .card-icon {
            text-align: center;
            line-height: 50px;
            margin-left: 15px;
            color: #000;
            position: absolute;
            right: -5px;
            top: 20px;
            opacity: 0.1;
        }

        .l-bg-cyan {
            background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
            color: #fff;
        }

        .l-bg-green {
            background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
            color: #fff;
        }

        .l-bg-orange {
            background: linear-gradient(to right, #f9900e, #ffba56) !important;
            color: #fff;
        }

        .l-bg-cyan {
            background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
            color: #fff;
        }



        /*btn flotante*/
        .btn-flotante {
            font-size: 14px;
            /* Cambiar el tamaño de la tipografia */
            text-transform: uppercase;
            /* Texto en mayusculas */
            font-weight: bold;
            /* Fuente en negrita o bold */
            color: #ffffff;
            /* Color del texto */
            border-radius: 40px 0 40px 40px;
            /* Borde del boton */
            letter-spacing: 2px;
            /* Espacio entre letras */
            background: linear-gradient(to right, #a80d08, #ff6756) !important;
            /* Color de fondo */
            /*background-color: #e9321e; /* Color de fondo */
            padding: 18px 30px;
            /* Relleno del boton */
            position: fixed;
            bottom: 40px;
            right: 40px;
            transition: all 300ms ease 0ms;
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.5);
            z-index: 99;
            border: none;
            outline: none;
        }

        .btn-flotante:hover {
            background-color: #2c2fa5;
            /* Color de fondo al pasar el cursor */
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
            transform: translateY(-7px);
        }

        @media only screen and (max-width: 600px) {
            .btn-flotante {
                font-size: 14px;
                padding: 12px 20px 0 0;
                bottom: 20px;
                right: 20px;
            }
        }

          /*btn flotante1*/
          .btn-flotante-1 {
            font-size: 14px;
            /* Cambiar el tamaño de la tipografia */
            text-transform: uppercase;
            /* Texto en mayusculas */
            font-weight: bold;
            /* Fuente en negrita o bold */
            color: #ffffff;
            /* Color del texto */
            border-radius: 40px 40px 40px 40px;
            /* Borde del boton */
            letter-spacing: 2px;
            /* Espacio entre letras */
            background: linear-gradient(to right, #a80d08, #ff6756) !important;
            /* Color de fondo */
            /*background-color: #e9321e; /* Color de fondo */
            padding: 18px 30px;
            /* Relleno del boton */
            position: fixed;
            bottom: 40px;
            right: 40px;
            transition: all 300ms ease 0ms;
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.5);
            z-index: 99;
            border: none;
            outline: none;
        }

        .btn-flotante-1:hover {
            background-color: #2c2fa5;
            /* Color de fondo al pasar el cursor */
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
            transform: translateY(-7px);
        }

        @media only screen and (max-width: 600px) {
            .btn-flotante-1 {
                font-size: 14px;
                padding: 12px 20px 0 0;
                bottom: 20px;
                right: 20px;
            }
        }
    </style>
@endsection


@section('scripts')
    <script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
@endsection

@section('contenido')
    <div class="card-body col-mb-12" style="min-height: 543px;">
        <!-- Content Header (Page header) -->

        <div class="row">

            <div class="col-lg-12">
                <div class="card-header  ">
                    <h1 class="card-title" style="font-size: 40px; font-weight:bold;">Base Paliativos</h1>
                    {{-- <div class="card-tools pull-right">
                        <!-- Se adiciona botón para crear pacientes -->
                        <button type="button" class="btn create_paciente btn-warning" name="create_paciente"
                            id="create_paciente"><i class="fa fa-fw fa-plus-circle"></i>Nuevo Paciente</button>
                    </div> --}}
                </div>
            </div><!-- /.col  -->

            @csrf
            <div class="card-body">
                <div class="row col-lg-12">


                    </tr>
                    </td>
                </div>
            </div><!-- /.row -->



        </div>
        <!-- /.content-header -->

        <!-- Main content -->


        <section class="content">

            @include('paliativos.cards.cards')

            <div class="row">
                <div class="col-12">
                    <div class="card shadow-lg p-3 mb-5 card-info card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-datos-del-pago-tab" data-toggle="pill"
                                        href="#custom-tabs-one-datos-del-pago" role="tab"
                                        aria-controls="custom-tabs-one-datos-del-pago" aria-selected="false">Pacientes
                                        Totales Paliativos</a>
                                </li>
                            </ul>
                        </div>


                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade active show" id="custom-tabs-one-datos-del-pago" role="tabpanel"
                                aria-labelledby="custom-tabs-one-datos-del-pago-tab">


                                @csrf
                                @include('paliativos.tablas.tablaPaliativos')

                            </div>
                        </div>

                        <!-- /.card -->
                    </div>
                </div>
                <button type="button" class="btn-flotante tooltipsC" id="agregar_paciente" title="Agregar paciente"><i
                        class="fa fa-fw fa-plus-circle fa-2x"></i><i class="fa fa-user fa-2x"></i></button>

            </div>


        </section>
        <!-- /.content -->

        @include('paliativos.modal.modalPaciente')

    </div>

@endsection

@section('scriptsPlugins')
    <script src="{{ asset("assets/$theme/plugins/datatables/jquery.dataTables.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js") }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/jquery-select2/select2.min.js') }}" type="text/javascript"></script>

    <script>
        $(document).ready(function() {

            // Btn flotante
            $('.botonF1').hover(function() {

            })


            // funcion para cargar el select de position
            $.get('select_user',
                function(usuarios) {
                    $('#usuario').empty();
                    $('#usuario').append("<option value=''>---seleccione usuario---</option>")
                    $.each(usuarios, function(usuarios1, value) {
                        $('#usuario').append("<option value='" + value.id + "'>" + value.pnombre + ' ' +
                            value.papellido + ' ' + value.sapellido + "</option>")
                    });

                });
            $.get('selectlist',
                   function(typeDocument) {
                    $('#type_document').empty();
                    $('#type_document').append("<option value=''>--seleccione--</option>")
                    $.each(typeDocument[0], function(i, item) {
                        $('#type_document').append("<option value='" + item.id + "'>" + item.nombre + "-"
                            + item.descripcion + "</option>")
                    });

                });
                $.get('selectlist',
                   function(state) {
                    $('#state').empty();
                    $('#state').append("<option value=''>--seleccione--</option>")
                    $.each(state[1], function(i, item) {
                        $('#state').append("<option value='" + item.id + "'>" + item.nombre  + "</option>")
                    });

                });
                $.get('selectlist',
                   function(type) {
                    $('#type').empty();
                    $('#type').append("<option value=''>--seleccione--</option>")
                    $.each(type[2], function(i, item) {
                        $('#type').append("<option value='" + item.id + "'>" + item.nombre  + "</option>")
                    });

                });

            //--------- select2 -------//
            $("#usuario").select2({
                theme: "bootstrap"
            });

            $("#type_document").select2({
                theme: "bootstrap"
            });

            $("#state").select2({
                theme: "bootstrap"
            });

            $("#type").select2({
                theme: "bootstrap"
            });

            $("#sex").select2({
                theme: "bootstrap"
            });




            // Función para pintar tabla de Paliativos
            var datatable = $('#basePaliativos').DataTable({
                language: idioma_espanol,
                lengthMenu: [-1],
                processing: true,
                serverSide: true,
                aaSorting: [
                    [1, "asc"]
                ],
                ajax: {
                    url: "{{ route('indexpaliativos') }}",
                },
                columns: [{
                        data: 'action',
                        orderable: false
                    },
                    {
                        data: 'id'
                    },
                    {
                        data: 'future5' // Ips
                    },
                    {
                        data: 'pnombre'
                    },
                    {
                        data: 'snombre'
                    },
                    {
                        data: 'papellido'
                    },
                    {
                        data: 'sapellido'
                    },
                    {
                        data: 'type_document'
                    },
                    {
                        data: 'documento'
                    },
                    {
                        data: 'date_birth'
                    },
                    {
                        data: 'future4' //Diagnostico
                    },
                    {
                        data: 'municipality'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'celular'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'observacion'
                    },
                    {
                        data: 'date_in'
                    },
                    {
                        data: 'dead'
                    },
                    {
                        data: 'date_dead'
                    },
                    {
                        data: 'state'
                    },
                    {
                        data: 'type'
                    }
                ],
                // "columnDefs": [{
                //         "render": function(data, type, row) {
                //             return data + ' ' + row["papellido"] + ' ' + row["sapellido"];
                //         },
                //         "targets": [2]
                //     },
                //     {
                //         "visible": false,
                //         "targets": [3]
                //     },
                //     {
                //         "visible": false,
                //         "targets": [4]
                //     },
                //     {
                //         "visible": false,
                //         "targets": [5]
                //     }


                // ],

                //Botones----------------------------------------------------------------------
                "dom": 'Brtip',
                buttons: [

                    {

                        extend: 'copyHtml5',
                        titleAttr: 'Copy',
                        className: "btn btn-info"


                    },
                    {

                        extend: 'excelHtml5',
                        titleAttr: 'Excel',
                        className: "btn btn-success"


                    },
                    {

                        extend: 'csvHtml5',
                        titleAttr: 'csv',
                        className: "btn btn-warning"


                    },
                    {

                        extend: 'pdfHtml5',
                        titleAttr: 'pdf',
                        className: "btn btn-primary"


                    }
                ]
            });







            //función para traer el resumen de los widget del Detalle turnos

            fill_datatable1_resumen();

            function fill_datatable1_resumen() {
                $("#detalle").empty();
                $("#detalle1").empty();
                $("#detalle2").empty();
                $("#detalle3").empty();
                $("#detalle4").empty();
                $("#detalle5").empty();
                $.ajax({
                    url: "{{ route('hoursinfoc') }}",
                    dataType: "json",
                    success: function(data) {



                        // Widget trae el total de Pacientes
                        $.each(data.result1, function(i, item1) {

                            $("#detalle").append(

                                '<div class="small-box shadow-lg l-bg-blue-dark">' +
                                '<div class="inner">' +
                                '<h5><i class="fas fa-diagnoses"></i> ' + item1.turnos +
                                '<sup style="font-size: 20px"></sup></h5>' +
                                '<p><h5>TOTAL PACIENTES</h5></p>' +
                                '</div><div class="icon"><i class="fas fa-diagnoses"></i></div></div>'
                            );

                        })


                        //Widget Total Horas
                        $.each(data.result, function(i, item) {
                            var a = item.horas;
                            if (a == null) {
                                a = 0;
                            } else {
                                a = item.horas;
                            }
                            // Widget trae el total de Fallecidos
                            $("#detalle1").append(
                                '<div class="small-box shadow-lg  l-bg-cherry">' +
                                '<div class="inner">' +
                                '<h5><i class="fas fa-bible"></i> ' + a + '</h5>' +
                                '<p><h5>FALLECIDOS</h5></p>' +
                                '</div><div class="icon"><i class="fas fa-bible"></i></div></div>'
                            );

                        })




                        $("#detalle2").append(

                            '<div class="small-box shadow-lg l-bg-blued-dark">' +
                            '<div class="inner">' +
                            '<h5><i class="fas fa-handshake"></i> ' + data.result2 + '</h5>' +
                            '<p><h5>ATENDIDOS</h5></p>' +
                            '</div>' +
                            '<div class="icon"><i class="fas fa-handshake"></i>' +
                            '</div>' +
                            '</div>'

                        );

                        //Widget Horas Base


                        $("#detalle3").append(

                            '<div class="small-box shadow-lg l-bg-green-dark"><div class="inner">' +
                            '<h5><i class="fas fa-user-check"></i> ' + data.result3 + '</h5>' +
                            '<p><h5>PACIENTES ACTIVOS<sup style="font-size: 20px"></sup></h5></p>' +
                            '</div><div class="icon"><i class="fas fa-user-check"></i></div></div>'
                        );



                        //Widget Horas Adicionales


                        $("#detalle4").append(

                            '<div class="small-box shadow-lg l-bg-cyan"><div class="inner">' +
                            '<h5><i class="fas fa-clinic-medical"></i> ' + data.result4 + '</h5>' +
                            '<p><h5>PAC AMBULATORIOS<sup style="font-size: 20px"></sup></h5></p>' +
                            '</div><div class="icon"><i class="fas fa-clinic-medical"></i></div></div>'
                        );


                        //Widget Turnos Nocturnos
                        $.each(data.result1, function(i, item1) {

                            $("#detalle5").append(

                                '<div class="small-box shadow-lg l-bg-orange-dark"><div class="inner">' +
                                '<h5><i class="fas fa-ambulance"></i> ' + 0 +
                                '</h5>' +
                                '<p><h5>TOTAL HOSPITALIZADOS<sup style="font-size: 20px"></sup></h5></p>' +
                                '</div><div class="icon"><i class="fas fa-ambulance"></i></div></div>'
                            );

                        })


                        //Widget Horas Base


                        $("#detalle6").append(

                            '<div class="small-box shadow-lg l-bg-red-dark"><div class="inner">' +
                            '<h5><i class="fas fa-phone-slash"></i> ' + data.result3 + '</h5>' +
                            '<p><h5>PAC SIN CONTACTO<sup style="font-size: 20px"></sup></h5></p>' +
                            '</div><div class="icon"><i class="fas fa-phone-slash"></i></div></div>'
                        );



                        //Widget Horas Adicionales


                        $("#detalle7").append(

                            '<div class="small-box shadow-lg l-bg-yellow-dark"><div class="inner">' +
                            '<h5><i class="fas fa-door-open"></i> ' + data.result4 + '</h5>' +
                            '<p><h5>PAC EGRESADOS<sup style="font-size: 20px"></sup></h5></p>' +
                            '</div><div class="icon"><i class="fas fa-door-open"></i></div></div>'
                        );


                    }
                })

            };



// Función para abrir modal de paciente


      //Función para abrir detalle del registro
   $(document).on('click', '#agregar_paciente', function(){
        $('#modal-paciente').modal({backdrop: 'static', keyboard: false});
        $('#modal-paciente').modal('show');

    });


 });


        var idioma_espanol = {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla =(",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        };
    </script>
@endsection
