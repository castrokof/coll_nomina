<form id="form-general" class="form-horizontal">
<div class="modal-body main-body">
    <div class="form-group row">
    <div class="col-lg-3">
        <label for="name" class="control-label requerido">Fecha Reporte:</label>
        <input type="date" name="date_turn" class="form-control" id="date_turn" value="" required>
    </div>
    <div class="col-lg-3">
        <label for="name" class="control-label requerido">Hora Ingreso:</label>
        <input type="time" name="hours_initial_turn" class="form-control" id="hours_initial_turn" value="" required>
    </div>
    <div class="col-lg-3">
        <label for="idp" class="control-label requerido">Hora Salida:</label>
        <input type="time"  class="form-control" name="hours_end_turn" id="hours_end_turn" value="" required>
    </div>
    <div class="col-lg-9">
    <label for="observacion" class="col-xs-3 control-label ">Observación</label>
    <textarea name="observation" id="observation" class="form-control" rows="2" placeholder="Enter ..." value="{{old('observacion')}}"></textarea>
    </div>
    </div>
</div>
</form>
