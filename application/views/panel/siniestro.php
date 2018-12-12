<?php
$rs = $this->db->query("Select * from operadores");
$filas = $rs->result();
$optx = "";
foreach ($filas as $fila){
    $optx .= '<option value="'.$fila->id.'">'.$fila->nombre.'</option>';
}
?>
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
                         <form id="frmRecarga" type="post" action="#">
                        <div id="invoice-customer-details">
                           <hr>
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group pink">
                                    <i class="ft-calendar"></i> <b>Operador: </b>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <select id="operador" name="operador" class="form-control">
                                        <?=$optx?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group pink">
                                        <i class="ft-calendar"></i> <b>Numero: </b>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" id="numero" name="numero" class="form-control" required />
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
                                      <th>Operadora</th>
                                      <th>Numero</th>
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
<div id="editarRecarga" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="frmedit" action="#" onsubmit="return false" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <select class="form-control" id="operador-edit" name="operador-edit" required>
                                        <?=$optx?>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" id="numero-edit" name="numero-edit" placeholder="Numero" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" id="monto-edit" name="monto-edit" placeholder="Monto" class="form-control" required>
                                </div>
                                <p id="mensajeRespuesta-edit"></p>
                                <div class="col-md-12 form-group">
                                    <input type="hidden" id="id_recarga" name="id_recarga">
                                    <button type="submit" class="btn btn-primary  btn-block" style="background:#B3D900;border: solid 1px #B3D900;">Modificar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="modalEliminar" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="text-align:center;">
                <a href="<?=site_url()?>"><img src="<?=ASSETS?>img/brand.png" class="img-responsive" style="margin: 0 auto;"></a>
                <h3>¿Esta seguro de eliminar la recarga?</h3>
                <input type="hidden" id="id-eliminar">
            </div>
            <div class="modal-footer" style="text-align:center;">
                <button type="button" class="btn btn-danger" onclick="eliminarRecarga()">Si</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<script>
   $(function () {
       listar();
       $("#frmRecarga").on("submit",function () {
           var datos = $("#frmRecarga").serializeArray();
           $.ajax({
               url: "<?=site_url("panel/guardarRecarga")?>",
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
       $("#frmedit").submit(function() {
           console.log("Entrando...");
           $.ajax({
               url: '<?=site_url('panel')?>' + '/modificarRecarga',
               type: "POST",
               data: "operador="+$("#operador-edit").val()+"&numero="+$('#numero-edit').val()+"&monto="+$('#monto-edit').val()+"&id="+$("#id_recarga").val(),
               success: function(response) {
                   $("#editarRecarga").modal("hide");
                   $('#msg').modal('show');
                   $('#icono').html('<i class="fa fa-check mt-25" style="font-size:70px;color:#B3D900;"></i>');
                   $('#alerta').html('<p class="text-center">'+response+'</p>');
                   setTimeout('document.location.reload()',5000);
               }
           });

           return false;
       });
   });

  function listar(){
       $('.zero-configuration').DataTable({
           ajax: '<?=site_url('panel/listaRecargas')?>',
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
                   data: "numero",
               },
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

   function modalEditar(id) {
       $.ajax({
           url: '<?=site_url('panel')?>' + '/obtenerRecarga/'+id,
           type:"GET",
           dataType:"json",
           success: function (rep) {
               console.log(rep);
               $("#id_recarga").val(id);
               $("#operador-edit").val(rep.operador);
               $("#numero-edit").val(rep.numero);
               $("#monto-edit").val(rep.monto);
               $("#editarRecarga").modal("show");
           }
       });
   }

   function modalEliminar(id){
       $("#id-eliminar").val(id);
       $("#modalEliminar").modal("show");
   }

   function eliminarRecarga(){
       var id = $("#id-eliminar").val();
       $("#modalEliminar").modal("hide");
       $.ajax({
           url: '<?=site_url('panel')?>' + '/eliminarRecarga/'+id,
           type: "GET",
           success: function(response) {
               $('#msg').modal('show');
               $('#icono').html('<i class="fa fa-check mt-25" style="font-size:70px;color:#B3D900;"></i>');
               $('#alerta').html('<p class="text-center">'+response+'</p>');
               setTimeout('document.location.reload()',5000);
           }
       });
   }



</script>