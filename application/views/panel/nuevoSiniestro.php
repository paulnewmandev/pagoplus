

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
                  <div class="card-body">
                     <div class="form-body">
                        <form id="registraSiniestro" action="<?=site_url('panel')?>/registraSiniestro" class="form" onsubmit="return registraSiniestro();" method="post">
                           <input type="hidden" id="txtIDUsuario" name="txtIDUsuario" value="<?=$this->session->userdata('gs_id');?>">
                           <input type="hidden" id="txtIDAseguradora" name="txtIDAseguradora" value="<?=$this->session->userdata('gs_aseguradora');?>">
                           <div class="row">
                              <div class="col-md-10">&nbsp;</div>
                              <div class="col-md-2 text-right">
                                    <input type="text" id="txtFecha" name="txtFecha" class="form-control" value="<?=date('d/m/Y');?>" readonly required>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="txtSiniestro">Número Siniestro</label>
                                    <input type="text" id="txtSiniestro" name="txtSiniestro" class="form-control" required>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="txtDireccion">Tipo</label>
                                    <select id="cmbTipo" name="cmbTipo" class="form-control">
                                       <option value="">Seleccione..</option>
                                       <option value="Choque">Choque</option>
                                       <option value="Robo">Robo</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                              <label for="cmbProvincia">Provincia</label>
                              <select id="cmbProvincia" name="cmbProvincia" class="form-control">
                                <option value="" >Seleccione..</option>
                                <option value="Azuay">Azuay</option>
                                <option value="Guayas">Guayas</option>
                                <option value="Bolívar">Bolívar</option>
                                <option value="Cañar">Cañar</option>
                                <option value="Carchi">Carchi</option>
                                <option value="Chimborazo">Chimborazo</option>
                                <option value="Cotopaxi">Cotopaxi</option>
                                <option value="El Oro">El Oro</option>
                                <option value="Esmeraldas">Esmeraldas</option>
                                <option value="Galápagos">Galápagos</option>
                                <option value="Imbabura">Imbabura</option>
                                <option value="Loja">Loja</option>
                                <option value="Los Ríos">Los Ríos</option>
                                <option value="Manabí">Manabí</option>
                                <option value="Morona Santiago">Morona Santiago</option>
                                <option value="Napo">Napo</option>
                                <option value="Orellana">Orellana</option>
                                <option value="Pastaza">Pastaza</option>
                                <option value="Pichincha">Pichincha</option>
                                <option value="Santa Elena">Santa Elena</option>
                                <option value="Santo Domingo de los Tsáchilas">Santo Domingo de los Tsáchilas</option>
                                <option value="Sucumbíos">Sucumbíos</option>
                                <option value="Tungurahua">Tungurahua</option>
                                <option value="Zamora Chinchipe">Zamora Chinchipe</option>                           
                            </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="txtDireccion">Dirección</label>
                                <input type="text" id="txtDireccion" name="txtDireccion" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="txtTelefono">Teléfono</label>
                                    <input type="text" id="txtTelefono" name="txtTelefono" class="form-control" required>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="txtEmail">Email</label>
                                    <input type="email" id="txtEmail" name="txtEmail" class="form-control" required>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12" id="listaArchivos">
                                 <fieldset class="form-group">
                                    <div class="custom-file text-right">
                                       <div class="row">
                                          <div class="col-md-10">
                                             <input type="file" name="arcSiniestro[]" id="arcSiniestro" class="form-control input-archivo" required>
                                          </div>
                                          <div class="col-md-2">
                                             <button class="agregar btn btn-icon btn-info btn-sm" type="button"><i class="ft-plus-circle"></i></button>
                                             <button class="quitar btn btn-icon btn-info btn-sm" type="button"><i class="ft-minus-circle"></i></button>
                                          </div>
                                       </div>
                                    </div>
                                 </fieldset>
                              </div>
                           </div>
                           <div class="form-actions text-center"> 
                              <a href="<?=site_url('panel')?>/verSiniestros" class="btn btn-info btn-sm"><i class="ft-chevron-left"></i> Atras</a>              
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <button type="submit" id="submit" class="btn btn-info btn-sm">
                              <i class="ft-save"></i> Guardar
                              </button>
                           </div>    
                        </form>
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
         <div class="modal-footer">
            <button type="button" class="btn btn-info btn-sm" data-dismiss="modal" onclick="window.location.href='<?= site_url('panel') ?>/verSiniestros';">Aceptar
            </button>
         </div>
      </div>
   </div>
</div>
<div id="msgPdf" class="modal fade" tabindex="-1" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body" style="text-align:center;">
            <div id="iconoPdf"></div>
            <div id="alertaPdf"></div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Aceptar
            </button>
         </div>
      </div>
   </div>
</div>
<script>
$('#submit').click(function () {
            if ($('#cmbTipo').val() === "") {
                $('#cmbTipo').focus();
                $('#cmbTipo').css("color", "red");
            }
            if ($('#cmbProvincia').val() === "") {
                $('#cmbProvincia').focus();
                $('#cmbProvincia').css("color", "red");
            }
        });
$(document).ready(function() {
    $('input#txtSiniestro')
        .keypress(function(event) {
            if (event.which > 57 || this.value.length === 20) {
              return false;
            }
        });
    $('input#txtTelefono')
        .keypress(function(event) {
            if (event.which > 57 || this.value.length === 20) {
              return false;
            }
        });
});
$(':file').change(function() {
    var sizeByte = this.files[0].size;
    var tipo = this.files[0].type;
    if (tipo != "application/pdf") {
        $('#msgPdf').modal('show');
        $('#iconoPdf').html('<i class="ft-alert-circle mt-25" style="font-size:70px;color:#1E9FF2;"></i>');
        $('#alertaPdf').html('<p class="text-center">Disculpe solo se permite archivos en formato PDF</p>');
        $(this).val("");
    }
});
$("#listaArchivos").on("click", '.agregar', function() {
    var act = Date.now();
    var paren = jQuery(this).closest("fieldset").clone().appendTo("#listaArchivos");
    var cant = jQuery("#listaArchivos").find("fieldset").length;
    var pos = cant - 1;
    $("#listaArchivos").find("input[type=file]")[pos].id = "arcSiniestro" + act;
    $("#listaArchivos").find("input[type=file]")[pos].name = "arcSiniestro[]";
    $("#listaArchivos").find("input[type=file]")[pos].value = "";
});
$("#listaArchivos").on("click", '.quitar', function() {
var cant = jQuery("#listaArchivos").find('input[type=file]').length;
if (cant > 1) {
    var paren = $(this).closest("fieldset").remove();
}else{
    $('#msgPdf').modal('show');
    $('#iconoPdf').html('<i class="ft-alert-circle mt-25" style="font-size:70px;color:#1E9FF2;"></i>');
    $('#alertaPdf').html('<p class="text-center">Disculpe debe adjuntar archivo</p>');
}
});
function registraSiniestro() {
    var datap = new FormData();
    var i = 0;
    $(".input-archivo").each(function(index) {
        i++;
        var id = $(this).attr("id");
        var arcSiniestro = document.getElementById(id);
        var fileSiniestro = arcSiniestro.files[0];
        datap.append('arcSiniestro' + i, fileSiniestro);
    });
    datap.append('txtIDUsuario', $('#txtIDUsuario').val());
    datap.append('txtIDAseguradora', $('#txtIDAseguradora').val());
    datap.append('txtSiniestro', $('#txtSiniestro').val());
    datap.append('cmbTipo', $('#cmbTipo').val());
    datap.append('cmbProvincia', $('#cmbProvincia').val());
    datap.append('txtDireccion', $('#txtDireccion').val());
    datap.append('txtTelefono', $('#txtTelefono').val());
    datap.append('txtEmail', $('#txtEmail').val());
    $.ajax({
        url: '<?=site_url('panel')?>/registraSiniestro',
        type: 'POST',
        contentType: false,
        data: datap,
        processData: false,
        cache: false,
        async: true,
        success: function(rep) {
            if (rep == 'success') {
                $('#msg').modal('show');
                $('#icono').html('<i class="ft-alert-circle mt-25" style="font-size:70px;color:#1E9FF2;"></i>');
                $('#alerta').html('<p class="text-center">El siniestro fue agregado</p>');
            }
        }
    });
    return false;
}
</script>