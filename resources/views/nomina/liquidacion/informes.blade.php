@extends("theme.$theme.layout")

@section('titulo')
    Informes
@endsection

@section("styles")
<link href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>
<link href="{{asset("assets/css/select2.css")}}" rel="stylesheet" type="text/css"/>
<link href="{{asset("assets/css/select2-bootstrap.min.css")}}" rel="stylesheet" type="text/css"/>


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
          <div class="col-lg-3 col-6" id="detalle">
          </div>
          <div class="col-lg-3 col-6" id="detalle1">
          </div>
          <div class="col-lg-3 col-6" id="detalle2">
          </div>
          <div class="col-lg-3 col-6" id="detalle3">
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-tabs">
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


 function fill_datatable_tabla(fechaini = '', fechafin = '', usuario = '' )
         {
          var datatable = $('#tturnos').DataTable
          ({
              language: idioma_espanol,
              lengthMenu: [ -1],
              processing: true,
              serverSide: true,
              aaSorting: [[ 2, "asc" ]],


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



$('#buscar').click(function(){

       var fechaini = $('#fechaini').val();
       var fechafin = $('#fechafin').val();
       var usuario = $('#usuario').val();

        if(fechaini != '' && fechafin != '' && usuario != ''){

            $('#tturnos').DataTable().destroy();


            fill_datatable_tabla(fechaini, fechafin, usuario);
            fill_datatable1_resumen(fechaini, fechafin, usuario);



        }else{

             swal({
            title: 'Debes digitar fecha inicial, fecha final y usuario',
            icon: 'warning',
            buttons:{
                cancel: "Cerrar"

                    }
              })
        }

});


$('#reset').click(function(){
        $('#fechaini').val('');
        $('#fechafin').val('');
        $('#usuario').val('');
        $('#tturnos').DataTable().destroy();
        fill_datatable_tabla();
        fill_datatable1_resumen();

      });
});

//Detalle turnos

function fill_datatable1_resumen(fechaini = '', fechafin = '', usuario = '' )
{
 $("#detalle").empty();
 $("#detalle1").empty();
 $("#detalle2").empty();
 $("#detalle3").empty();
  $.ajax({
  url:"{{route('hoursinfoc')}}",
  data:{fechaini:fechaini, fechafin:fechafin, usuario:usuario },
  dataType:"json",
  success:function(data){
    $.each(data.result, function(i, item){

    $("#detalle").append(
        '<div class="small-box bg-info"><div class="inner">'+
        '<h5>TOTAL HORAS</h5>'+
        '<p><h5><i class="far fa-clock"></i> '+item.horas+'</h5></p>'+
        '</div><div class="icon"><i class="fas fa-business-time"></i></div></div>'
     );

  })
  $.each(data.result1, function(i, item1){

    $("#detalle1").append(

          '<div class="small-box bg-light"><div class="inner">'+
          '<h5>TURNOS NOCTURNOS<sup style="font-size: 20px"></sup></h5>'+
          '<p><h5><i class="fas fa-calendar-day"></i> '+item1.turnos+'</h5></p>'+
          '</div><div class="icon"><i class="fas fa-cloud-moon"></i></div></div>'
     );

    })
    $("#detalle2").append(

            '<div class="small-box bg-warning"><div class="inner">'+
            '<h5>TOTAL A PAGAR</h5>'+
            '<p><h5><i class="fas fa-dollar-sign"></i> '+data.result2+'</h5></p>'+
            '</div><div class="icon"><i class="fas fa-money-bill-alt"></i></div></div>'

         );


//     $.each(data.result3, function(i, item3){

//       $("#detalle3").append(

//             '<div class="small-box bg-danger"><div class="inner">'+
//             '<h5>TOTAL SALARIO</h5>'+
//             '<p><h5><i class="fas fa-dollar-sign"></i>'+item3.gastos+'</h5></p>'+
//             '</div><div class="icon"><i class="fas fa-route"></i></div></div>'

//          );

//       });
  }

});
}

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
