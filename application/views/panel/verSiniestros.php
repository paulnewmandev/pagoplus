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
                    <table class="table table-striped table-bordered zero-configuration" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Fecha</th>
                          <th>Siniestro Nº</th>
                          <th>Teléfono</th>
                          <th>Status</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                    </table>
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
                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal" onclick="window.location.href='<?= site_url('panel') ?>/verSiniestros';">Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<div id="modalEliminar" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="text-align:center;">
            <i class="ft-alert-circle mt-25" style="font-size:70px;color:#1E9FF2;"></i>
             <h3>¿Esta seguro de eliminar el siniestro?</h3>
                <input type="hidden" id="id-eliminar">
            </div>
            <div class="modal-footer" style="text-align:center;">
                <button type="button" class="btn btn-info btn-sm" onclick="eliminaSin()">Si</button>
                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<script>
function modalEliminar(id){
    $("#id-eliminar").val(id);
    $("#modalEliminar").modal("show");
}

    function eliminaSin(){
        var id = $("#id-eliminar").val();
        $("#modalEliminar").modal("hide");
        $.ajax({
            url: '<?=site_url('panel')?>' + '/eliminaSiniestro',
            type: "POST",
            data: "id="+id,
            success: function(response) {
                $('#msg').modal('show');
                $('#icono').html('<i class="ft-alert-circle mt-25" style="font-size:70px;color:#1E9FF2;"></i>');
                $('#alerta').html('<p class="text-center">El siniestro fue eliminado.</p>');
            }
        });
    }
$(document).ready(function(){
    $('.zero-configuration').DataTable({
        ajax: '<?=site_url('panel')?>' + '/buscarSiniestros',
        order: [
            [0, 'desc']
        ],
        columns: [
            {
                visible: false,
                data: "id"
            },
            {
                orderable: false,
                data: "fecha"
            },
            {
                orderable: false,
                data: "numero",
            },
            {
                orderable: false,
                data: "telefono",
            },
            {
                orderable: false,
                data: "status",
            },
            {data: "id",searchable: false, orderable: false, width:"80px", "render": function ( data, type, row, meta ) {
                    return '<a href="<?=site_url('panel')?>/siniestro/'+ data +'" title="Ver"><img src="<?=ASSETS?>img/ver.png" style="margin: 0 auto;"></a>&nbsp;&nbsp;'+
						   '<a href="#" onclick="modalEliminar('+ data +');" title="Eliminar"><img src="<?=ASSETS?>img/eliminar.png" style="margin: 0 auto;"></a>'; 
            }
		    }
            ]
    });
});
</script>