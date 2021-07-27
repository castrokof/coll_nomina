
<div class="modal-body main-body">
    <div class="form-group row">
    <div class="col-lg-3">
        <label for="name" class="control-label requerido">Fecha Reporte:</label>
        <input type="date" name="date_turn" class="form-control" id="date_turn" value="" required>
    </div>
    <div class="col-lg-3">
        <label for="name" class="control-label requerido">Hora Ingreso:</label>
        <input name="hours_initial_turn" class="form-control" id="hours_initial_turn" value="" required>
    </div>
    <div class="col-lg-3">
        <label for="name" class="control-label requerido">Hora Salida:</label>
        <input class="form-control" name="hours_end_turn" id="hours_end_turn" value="" required>
    </div>
    <div>
    <label for="jornada" class="col-xs-2 control-label requerido">Jornada</label>
        <select name="jornada" id="jornada" class="form-control select2bs4" style="width: 100%;">
            <option value="">---Seleccione el Jornada---</option>
            <option value="0">Diurno</option>
            <option value="1">Nocturno</option>
        </select>
    </div>
        <div class="col-lg-9">
    <label for="observacion" class="col-xs-3 control-label ">Observación</label>
    <textarea name="observation" id="observation" class="form-control" rows="2" placeholder="Enter ..." value="{{old('observacion')}}"></textarea>
    </div>
    </div>
    <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{Session()->get('usuario_id')}}" >
</div>

