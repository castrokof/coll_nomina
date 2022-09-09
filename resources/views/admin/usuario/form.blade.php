<div class="form-group row">
    <div class="col-lg-3">
        <label for="pnombre" class="col-xs-4 control-label requerido">Primer nombre</label>
        <input type="text" name="pnombre" id="pnombre" class="form-control" value="{{ old('pnombre') }}" required>
    </div>
    <div class="col-lg-3">
        <label for="snombre" class="col-xs-4 control-label requerido">Segundo nombre</label>
        <input type="text" name="snombre" id="snombre" class="form-control" value="{{ old('snombre') }}">
    </div>
    <div class="col-lg-3">
        <label for="papellido" class="col-xs-4 control-label requerido">Primer apellido</label>
        <input type="text" name="papellido" id="papellido" class="form-control" value="{{ old('papellido') }}"
            required>
    </div>
    <div class="col-lg-3">
        <label for="sapellido" class="col-xs-4 control-label requerido">Segundo apellido</label>
        <input type="text" name="sapellido" id="sapellido" class="form-control" value="{{ old('sapellido') }}">
    </div>
</div>
<div class="form-group row">

    <div class="col-lg-2">
        <label for="tipo_documento" class="col-xs-4 control-label requerido">Tipo doc</label>

        <select name="tipo_documento" id="tipo_documento" class="form-control select2bs4" required>
            <option value="">-seleccione-</option>
            <option value="CE">AS</option>
            <option value="CC">CC</option>
            <option value="CE">CE</option>
            <option value="MS">MS</option>
            <option value="NI">NI</option>
            <option value="NU">NU</option>
            <option value="PE">PE</option>
            <option value="RC">RC</option>
            <option value="TI">TI</option>
        </select>
    </div>
        <div class="col-lg-3">
            <label for="documento" class="col-xs-4 control-label requerido">Documento</label>
        <input type="text" name="documento" id="documento" class="form-control" value="{{ old('documento') }}"
            minlength="6" required>
        </div>


    <div class="col-lg-2">
        <label for="usuario" class="col-xs-4 control-label requerido">Usuario</label>
        <input type="text" name="usuario" id="usuario" class="form-control" value="{{ old('usuario') }}" required>
    </div>
    <div class="col-lg-2">
        <label for="email" class="col-xs-4 control-label requerido">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="col-lg-3">
        <label for="celular" class="col-xs-4 control-label requerido">Celular</label>
        <input type="text" name="celular" id="celular" class="form-control" value="{{ old('celular') }}"
            required>
    </div>

</div>
<div class="form-group row">
    <div class="col-lg-3">
        <label for="password" class="col-xs-4 control-label requerido">Password</label>
        <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}"
            minlength="6" required>
    </div>

    <div class="col-lg-3">
        <label for="remenber_token" class="col-xs-4 control-label requerido">repita el password</label>
        <input type="password" name="remenber_token" id="remenber_token" class="form-control"
            value="{{ old('remenber_token') }}" minlength="6" required>
    </div>
    <div class="col-lg-3">
        <label for="type_contrat" class="col-xs-4 control-label requerido">Contrato</label>
        <select name="type_contrat" id="type_contrat" class="form-control select2bs4" style="width: 100%;" required>
            <option value="">---seleccione---</option>
            <option value="PS">PRESTACIÓN DE SERVICIOS</option>
            <option value="CT">CONTRATO DE TRABAJO</option>
        </select>
    </div>
    <div class="col-lg-3">
        <label for="cargo_id" class="col-xs-4 control-label requerido">Cargo</label>
        <select name="cargo_id" id="cargo_id" class="form-control select2bs4" style="width: 100%;" required>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-3">
        <label for="ips" class="col-xs-4 control-label requerido">Ips</label>
        <select name="ips" id="ips" class="form-control select2bs4" style="width: 100%;" required>
        </select>
    </div>
    <div class="col-lg-3">
        <label for="rol_id" class="col-xs-4 control-label requerido">Rol</label>
        <select name="rol_id" id="rol_id" class="form-control select2bs4" style="width: 100%;">
            <option value="">---seleccione el rol---</option>
            @foreach ($Rols1 as $id => $nombre)
                <option value="{{ $id }}"
                    {{ old('rol_id', $data->roles1[0]->id ?? '') == $id ? 'selected' : '' }}>{{ $nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-lg-3">
        <label for="activo" class="col-xs-4 control-label requerido">Estado</label>
        <select name="activo" id="activo" class="form-control select2bs4" style="width: 100%;">
            <option value="">---seleccione el estado---</option>
            <option value="1">activo</option>
            <option value="0">inactivo</option>
        </select>
    </div>
    <div class="col-lg-3">
        <label for="type_salary" class="col-xs-4 control-label requerido">Tipo de Salario</label>
        <select name="type_salary" id="type_salary" class="form-control select2bs4" style="width: 100%;" required>
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

<div class="form-group row">

    <div class="col-lg-3">
        <label for="date_in" class="col-xs-4 control-label requerido">Fecha ingreso</label>
        <input type="date" name="date_in" id="date_in" class="form-control" value="{{ old('account') }}"
            required>
    </div>

    <div class="col-lg-3">
        <label for="name_bank" class="col-xs-4 control-label requerido">Banco</label>
        <select name="name_bank" id="name_bank" class="form-control select2bs4" style="width: 100%;" required>
        </select>

    </div>

    <div class="col-lg-3">
        <label for="type_account" class="col-xs-4 control-label requerido">Tipo de cuenta</label>
        <select name="type_account" id="type_account" class="form-control select2bs4" style="width: 100%;" required>
        </select>

    </div>
    <div class="col-lg-3">
        <label for="account" class="col-xs-4 control-label requerido"># de Cuenta</label>
        <input type="number" name="account" id="account" class="form-control" value="{{ old('account') }}"
            required>
    </div>

</div>
