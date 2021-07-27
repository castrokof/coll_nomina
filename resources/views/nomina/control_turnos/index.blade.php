@extends("theme.$theme.layout")

@section('titulo')
    Control de turnos
@endsection
@section("styles")
<link href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>
<link href="{{asset("assets/css/select2-bootstrap.min.css")}}" rel="stylesheet" type="text/css"/>
<link href="{{asset("assets/css/select2.min.css")}}" rel="stylesheet" type="text/css"/>

@endsection


@section('scripts')

@endsection

@section('contenido')
<div class="row">
  <div class="col-lg-12">
      <div class="card card-info">
      <div class="card-header with-border p-2">
        <h3 class="card-title">Registro de turnos</h3>
        <div class="card-body">
            @include('nomina.control_turnos.form-registro')
            @include('includes.boton-form-registrar-pago')
        </div>
      </div>
    <div class="card-body table-responsive p-2">

    <table id="pago" class="table table-hover display responsive" cellspacing="0" width="100%">
     <thead>
      <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Observación</th>
            <th>Fecha y hora de registro</th>


      </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</form>
  <!-- /.card-body -->
</div>
</div>
</div>






@endsection



@section("scriptsPlugins")
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/jquery-select2/select2.min.js")}}" type="text/javascript"></script>



<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<script>
</script>


@endsection
