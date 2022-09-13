<div class="form-group row">
    <div class="col-lg-3">
        <label for="type_contrat"
            class="col-xs-4 control-label requerido">Contrato</label>
        <select name="type_contrat" id="type_contrat" class="form-control select2bs4"
            style="width: 100%;" required>
            <option value="">---seleccione---</option>
            <option value="PS">PRESTACIÓN DE SERVICIOS</option>
            <option value="CT">CONTRATO DE TRABAJO</option>
        </select>
    </div>
    <div id="salaryform" class="col-lg-3" style="display: none;">
        <label for="salary" class="col-xs-4 control-label requerido">Salario
            CT</label>
        <input type="number" name="salary" id="salary" class="form-control "
            style="width: 100%;">

    </div>
    <div id="salarypsform" class="col-lg-3" style="display:none;">
        <label for="salary_ps" class="col-xs-4 control-label requerido">Salario
            PS</label>
        <input type="number" name="salary_ps" id="salary_ps" class="form-control "
            style="width: 100%;">

    </div>


    <div class="col-lg-3">
        <label for="activo" class="col-xs-4 control-label requerido">Estado</label>
        <select name="activo" id="activo" class="form-control select2bs4"
            style="width: 100%;">
            <option value="">---seleccione el estado---</option>
            <option value="1">activo</option>
            <option value="0">inactivo</option>
        </select>
    </div>
    <div class="col-lg-3">
        <label for="type_salary" class="col-xs-4 control-label requerido">Tipo de
            Salario</label>
        <select name="type_salary" id="type_salary" class="form-control select2bs4"
            style="width: 100%;" required>
            <option value="">---seleccione---</option>
            <option value="FIJO-QUINCENAL">FIJO-QUINCENAL</option>
            <option value="FIJO-MENSUAL">FIJO-MENSUAL</option>
            <option value="FIJO-QUINCENAL-MENSUAL">FIJO-QUINCENAL-MENSUAL</option>
            <option value="HORAS-QUINCENAL">HORAS-QUINCENAL</option>
            <option value="HORAS-MENSUAL">HORAS-MENSUAL</option>
            <option value="PACIENTES-QUINCENAL">PACIENTES-QUINCENAL</option>
        </select>
    </div>

</div>
