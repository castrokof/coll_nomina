
                        <div class="form-group row">

                            <div class="col-lg-3">
                                <label for="date_in" class="col-xs-4 control-label requerido">Fecha
                                    ingreso</label>
                                <input type="date" name="date_in" id="date_in" class="form-control"
                                    value="{{ old('account') }}" required>
                            </div>

                            <div class="col-lg-3">
                                <label for="name_bank" class="col-xs-4 control-label requerido">Banco</label>
                                <select name="name_bank" id="name_bank" class="form-control select2bs4"
                                    style="width: 100%;" required>
                                </select>

                            </div>

                            <div class="col-lg-3">
                                <label for="type_account" class="col-xs-4 control-label requerido">Tipo de
                                    cuenta</label>
                                <select name="type_account" id="type_account" class="form-control select2bs4"
                                    style="width: 100%;" required>
                                </select>

                            </div>
                            <div class="col-lg-3">
                                <label for="account" class="col-xs-4 control-label requerido"># de
                                    Cuenta</label>
                                <input type="number" name="account" id="account" class="form-control"
                                    value="{{ old('account') }}" required>
                            </div>

                        </div>
