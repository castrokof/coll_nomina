@extends("theme.$theme.layout")

@section('titulo')
    Informes
@endsection

@section("styles")
<link href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>
<link href="{{asset("assets/css/select2.css")}}" rel="stylesheet" type="text/css"/>
<link href="{{asset("assets/css/select2-bootstrap.min.css")}}" rel="stylesheet" type="text/css"/>



<style>




/* // Colores para las tarjetas widget */
.card {
    background-color: #fff;
    border-radius: 10px;
    border: none;
    position: relative;
    margin-bottom: 30px;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
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

.card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
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
	font-size: 14px; /* Cambiar el tamaño de la tipografia */
	text-transform: uppercase; /* Texto en mayusculas */
	font-weight: bold; /* Fuente en negrita o bold */
	color: #ffffff; /* Color del texto */
	border-radius: 120px; /* Borde del boton */
	letter-spacing: 2px; /* Espacio entre letras */
    background: linear-gradient(to right, #a80d08, #ff6756) !important; /* Color de fondo */
	/*background-color: #e9321e; /* Color de fondo */
	padding: 18px 30px; /* Relleno del boton */
	position: fixed;
	bottom: 40px;
	right: 40px;
	transition: all 300ms ease 0ms;
	box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.5);
	z-index: 99;
    border:none;
    outline:none;
}
.btn-flotante:hover {
	background-color: #2c2fa5; /* Color de fondo al pasar el cursor */
	box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
	transform: translateY(-7px);
}
@media only screen and (max-width: 600px) {
 	.btn-flotante {
		font-size: 14px;
		padding: 12px 20px;
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





<div class="content-wrapper col-mb-12" style="min-height: 543px;" >
    <!-- Content Header (Page header) -->
<div class="row">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">Informes</h1>
          </div><!-- /.col -->

          @csrf
          <div class="card-body">
          <div class="row col-lg-12">

            @include('nomina.liquidacion.form')

          </tr>
          </td>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
</div>
    <!-- /.content-header -->

    <!-- Main content -->
<section class="content">




      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2 col-6" id="detalle">
          </div>
          <div class="col-lg-2 col-6" id="detalle3">
          </div>
          <div class="col-lg-2 col-6" id="detalle4">
          </div>
          <div class="col-lg-2 col-6" id="detalle1">
          </div>
          <div class="col-lg-2 col-6" id="detalle5">
          </div>
          <div class="col-lg-2 col-6" id="detalle2">
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-12">
          <div class="card shadow-lg p-3 mb-5 card-info card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active"
                  id="custom-tabs-one-datos-del-pago-tab"
                  data-toggle="pill"
                  href="#custom-tabs-one-datos-del-pago"
                  role="tab"
                  aria-controls="custom-tabs-one-datos-del-pago"
                  aria-selected="false">Turnos registrados</a>
                </li>
              </ul>
            </div>


              <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-one-datos-del-pago" role="tabpanel" aria-labelledby="custom-tabs-one-datos-del-pago-tab">


                      @csrf
                      @include('nomina.liquidacion.form-turnos')

                </div>
               </div>

            <!-- /.card -->
          </div>
        </div>
        <button type="button" class="btn-flotante tooltipsC" id="liquidar" title="Liquidar turno"><i class="fas fa-save fa-2x"></i></button>

      </div>


</section>
    <!-- /.content -->

</div>
</div>



@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/jquery-select2/select2.min.js")}}" type="text/javascript"></script>

<script>

$(document).ready(function() {

// variables globales
  var fechaini = '';
  var fechafin = '';
  var usuario = '';


// Btn flotante
    $('.botonF1').hover(function(){

    })



    $("#selectall").on('click', function() {
    $(".case").prop("checked", this.checked);
    });



// funcion para cargar el select de position
    $.get('select_user',
        function(usuarios)
        {
            $('#usuario').empty();
            $('#usuario').append("<option value=''>---seleccione usuario---</option>")
            $.each(usuarios, function(usuarios1, value){
            $('#usuario').append("<option value='" + value.id + "'>" + value.pnombre +' '+ value.papellido +' '+ value.sapellido +"</option>")
            });

    });

//--------- select2 -------//
    $("#usuario").select2({
        theme: "bootstrap"
                });




    fill_datatable_tabla();
    fill_datatable1_resumen();


// Callback para filtrar los datos de la tabla y detalle
    $('#buscar').click(function(){

    fechaini = $('#fechaini').val();
    fechafin = $('#fechafin').val();
    usuario = $('#usuario').val();

    $("#selectall").prop("checked", false);

        if(fechaini != '' && fechafin != '' && usuario != ''){

            $('#tturnos').DataTable().destroy();

            fill_datatable_tabla(fechaini, fechafin, usuario);
            fill_datatable1_resumen(fechaini, fechafin, usuario);


        }else{

            Swal.fire({
            title: 'Debes digitar fecha inicial, fecha final y usuario',
            icon: 'warning',
            buttons:{
                cancel: "Cerrar"

                    }
            })
        }

    });


// Función para filtrar cargar los datos en la tabla

 function fill_datatable_tabla(fechaini = '', fechafin = '', usuario = '' )
         {
          var datatable = $('#tturnos').DataTable
          ({
              language: idioma_espanol,
              lengthMenu: [ -1],
              processing: true,
              serverSide: true,
              aaSorting: [[ 6, "asc" ]],


          ajax:{
               url:"{{route('hoursinfo')}}",
                data:{fechaini:fechaini, fechafin:fechafin,usuario:usuario }
              },
              columns: [
          {data:'action',
           orderable: false},
          {data:'id'},
          {data:'pnombre'},
          {data:'snombre'},
          {data:'papellido'},
          {data:'sapellido'},
          {data:'date_hour_initial_turn'},
          {data:'date_hour_end_turn'},
          {data:'hours'},
          {data:'working_type'},
          {data:'quincena'},
          {data:'observation'},
          {data:'created_at'}
        ],
        "columnDefs": [
                                    {
                                    "render": function ( data, type, row ) {
                                            return data +' '+row["papellido"]+' '+row["sapellido"];
                                        },
                                        "targets":[2]
                                    },
                                    { "visible": false,  "targets": [3] },
                                    { "visible": false,  "targets": [4] },
                                    { "visible": false,  "targets": [5] }


                      ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;


            // var intVal = function ( i ) {
            //     return typeof i === 'string' ?
            //         i.replace(/[\$.]/g, '')*1 :
            //         typeof i === 'number' ?
            //             i : 0;
            // };


            hourst = api
                .column(8, { page: 'current'})
                .data()
                .reduce(function (a, b) {
                    return parseInt(a) + parseInt(b);
                }, 0);


            $(api.column(8).footer()).html(hourst);


          },
              //Botones----------------------------------------------------------------------
        "dom":'Brtip',
               buttons: [

                   {

               extend:'copyHtml5',
               titleAttr: 'Copy',
               className: "btn btn-info"


                  },
                  {

               extend:'excelHtml5',
               titleAttr: 'Excel',
               className: "btn btn-success"


                  },
                   {

               extend:'csvHtml5',
               titleAttr: 'csv',
               className: "btn btn-warning"


                  },
                  {

               extend:'pdfHtml5',
               titleAttr: 'pdf',
               className: "btn btn-primary"


                  }
               ]
             });
 }


// Función para limpiar los inputs



    $('#reset').click(function(){
            $('#fechaini').val('');
            $('#fechafin').val('');
            $('#usuario').val('');
            $('#tturnos').DataTable().destroy();
            fill_datatable_tabla();
            fill_datatable1_resumen();

        });
    });




// Función para liquidar los turnos seleccionados

    $('#liquidar').click(function(){

    var id = [];
    var supervisor ="{{Session()->get('usuario') ?? ''}}";

    fechaini = $('#fechaini').val();
    fechafin = $('#fechafin').val();
    usuario = $('#usuario').val();

    Swal.fire({
        title: "¿Estás seguro?",
        text: "Estás por liquidar los turnos seleccionados",
        icon: "warning",
        showCancelButton: true,
        showCloseButton: true,
        confirmButtonText: 'Aceptar',
        }).then((result)=>{
        if(result.value){
        $('input:checkbox:checked').each(function() {
        id.push($(this).val());

            });

        if(id.length > 0)
        {
        Swal.fire({
                title: 'Espere por favor !',
                html: 'Realizando la liquidación',// add html attribute if you want or remove
                showConfirmButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading()
                    },
            }),
        $.ajax({
                url:"{{ route('liquidar')}}",
                method:'post',
                data:{id:id, supervisor:supervisor,

                "_token": $("meta[name='csrf-token']").attr("content")

                },
                success:function(data)
                {
                if(data.success1 = 'ok') {
                    $('#tturnos').DataTable().ajax.reload();
                    $("#detalle").empty();
                    $("#detalle1").empty();
                    $("#detalle2").empty();
                    $("#detalle3").empty();
                    $("#detalle4").empty();
                    $("#detalle5").empty();
                    fill_datatable1_resumen(fechaini, fechafin, usuario);
                Swal.fire(
                            {
                            icon: 'success',
                            title: 'Liquidación registrada correctamente',
                            showConfirmButton: true,
                            timer: 1500
                            }
                        )

                }else if(data.success1 = 'ng') {
                $('#tturnos').DataTable().ajax.reload();
                Swal.fire(
                            {
                            icon: 'success',
                            title: 'No se pudo realizar la liquidación',
                            showConfirmButton: true,
                            timer: 1500
                            }
                        )

                }
                }
                });

        }
        else
        {

        Swal.fire({
            title: 'Por favor seleccione un turno del checkbox',
            icon: 'warning',
            buttons:{
                cancel: "Cerrar"

                    }
            })
            }
        }});
        }
    );




//función para traer el resumen de los widget del Detalle turnos

    function fill_datatable1_resumen(fechaini = '', fechafin = '', usuario = '' )
    {
    $("#detalle").empty();
    $("#detalle1").empty();
    $("#detalle2").empty();
    $("#detalle3").empty();
    $("#detalle4").empty();
    $("#detalle5").empty();
    $.ajax({
    url:"{{route('hoursinfoc')}}",
    data:{fechaini:fechaini, fechafin:fechafin, usuario:usuario },
    dataType:"json",
    success:function(data){


        //Widget Total Horas
        $.each(data.result, function(i, item){
        var a = item.horas;
            if(a == null){
                a = 0;
            }else{
                a = item.horas;
            }
        $("#detalle").append(
            '<div class="small-box shadow-lg  l-bg-cherry"><div class="inner">'+
            '<h5>TOTAL HORAS</h5>'+
            '<p><h5><i class="far fa-clock"></i> '+a+'</h5></p>'+
            '</div><div class="icon"><i class="fas fa-business-time"></i></div></div>'
        );

    })


    //Widget Turnos Nocturnos
    $.each(data.result1, function(i, item1){

        $("#detalle1").append(

            '<div class="small-box shadow-lg l-bg-blue-dark"><div class="inner">'+
            '<h5>TURNOS NOCTURNOS<sup style="font-size: 20px"></sup></h5>'+
            '<p><h5><i class="fas fa-calendar-day"></i> '+item1.turnos+'</h5></p>'+
            '</div><div class="icon"><i class="fas fa-cloud-moon"></i></div></div>'
        );

        })
        $("#detalle2").append(

                '<div class="small-box shadow-lg l-bg-red-dark"><div class="inner">'+
                '<h5>TOTAL A PAGAR</h5>'+
                '<p><h5><i class="fas fa-dollar-sign"></i> '+data.result2+'</h5></p>'+
                '</div><div class="icon"><i class="fas fa-money-bill-alt"></i></div></div>'

            );

        //Widget Horas Base


            $("#detalle3").append(

                '<div class="small-box shadow-lg l-bg-green-dark"><div class="inner">'+
                '<h5>HORAS BASE<sup style="font-size: 20px"></sup></h5>'+
                '<p><h5><i class="far fa-clock"></i> '+data.result3+'</h5></p>'+
                '</div><div class="icon"><i class="fas fa-business-time"></i></div></div>'
            );



            //Widget Horas Adicionales


            $("#detalle4").append(

                '<div class="small-box shadow-lg l-bg-cyan"><div class="inner">'+
                '<h5>HORAS ADICIONALES<sup style="font-size: 20px"></sup></h5>'+
                '<p><h5><i class="far fa-clock"></i> '+data.result4+'</h5></p>'+
                '</div><div class="icon"><i class="fas fa-business-time"></i></div></div>'
            );


                    //Widget Turnos Nocturnos
            $.each(data.result1, function(i, item1){

            $("#detalle5").append(

                '<div class="small-box shadow-lg l-bg-orange-dark"><div class="inner">'+
                '<h5>PACIENTES ATENDIDOS<sup style="font-size: 20px"></sup></h5>'+
                '<p><h5><i class="fas fa-calendar-day"></i> '+0+'</h5></p>'+
                '</div><div class="icon"><i class="fas fa-hospital"></i></div></div>'
            );

            })



        }
    })

    };
   var idioma_espanol =
                 {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
                } ;



  </script>



@endsection
