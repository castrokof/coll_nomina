<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.form-mensaje')
        <div class="card card-info">
            <div class="card-header with-border">
                <h3 class="card-title-1">Cargos</h3>
                <div class="card-tools pull-right">
                    <button type="button" class="btn btn-default" name="create_cargo" id="create_cargo" data-toggle="modal" data-target="#modal-u"><i class="fa fa-fw fa-plus-circle"></i> Nuevo Cargo</button>
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive p-2">

                <table id="registro" class="table table-hover display responsive" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Accion</th>
                            <th>ID</th>
                            <th>Cargo</th>
                            <th>Salario</th>
                            <th>Valor Hora</th>
                            <th>Valor Hora Adicional</th>
                            <th>Valor Paciente Atendido</th>
                            <th>Valor Turno Nocturno</th>
                            <th>Fecha Creacion</th>
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