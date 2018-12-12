
<style>
    .modal-full {
        min-width: 100%;
        margin: 0;
    }
    .modal-full .modal-content {
        min-height: 100vh;
    }
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div id="invoice-template" class="card-body">
                                    <form id="frmPago" type="post" action="#">
                                        <div id="invoice-customer-details">
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group pink">
                                                        <i class="ft-calendar"></i> <b>Nombre: </b>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" id="nombres" name="nombres" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group pink">
                                                        <i class="ft-calendar"></i> <b>Cedula: </b>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" id="cedula" name="cedula" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group pink">
                                                        <i class="ft-calendar"></i> <b>factura: </b>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" id="n_factura" name="n_factura" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group pink">
                                                        <i class="ft-calendar"></i> <b>Monto: </b>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" id="monto" name="monto" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>

                                            </div>
                                            <hr>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered zero-configuration" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Nombres</th>
                                                <th>Cedula</th>
                                                <th>Factura</th>
                                                <th>Monto</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>
<div id="msg" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="text-align:center;">
                <div id="icono"></div>
                <div id="alerta"></div>
            </div>
            <div class="modal-footer" style="text-align:center;">
                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        listar();
        $("#frmPago").on("submit",function () {
            var datos = $("#frmPago").serializeArray();
            $.ajax({
                url: "<?=site_url("panel/guardarPago")?>",
                type:'POST',
                data:datos,
                success: function (rep) {
                    if(rep=='success'){
                        $('#msg').modal('show');
                        $('#icono').html('<i class="ft-alert-circle mt-25" style="font-size:70px;color:#1E9FF2;"></i>');
                        $('#alerta').html('<p class="text-center">Se registro con exito</p>');
                        setTimeout('document.location.reload()',5000);
                    }else{
                        $('#msg').modal('show');
                        $('#icono').html('<i class="ft-alert-circle mt-25" style="font-size:70px;color:#1E9FF2;"></i>');
                        $('#alerta').html('<p class="text-center">Error</p>');
                    }
                }
            });
            return false;
        })
    });

    function listar(){
        $('.zero-configuration').DataTable({
            ajax: '<?=site_url('panel/listaPagos')?>',
            order: [
                [0, 'desc']
            ],
            columns: [

                {
                    orderable: false,
                    data: "nombre"
                },
                {
                    orderable: false,
                    data: "cedula",
                },
                {
                    orderable: false,
                    data: "factura",
                }
                ,
                {
                    orderable: false,
                    data: "monto",
                },
                {
                    orderable: false,
                    data: "acciones",
                }
            ]
        });
    }

</script>