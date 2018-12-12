<?php
if(!empty($this->uri->segment('3'))){
   $Sin = $this->db->query("SELECT 
                                 siniestro.id AS id, 
                                 DATE_FORMAT(siniestro.fecha, '%d/%m/%Y') fecha, 
                                 siniestro.observacion AS observacion,
                                 siniestro.siniestro AS siniestro, 
                                 siniestro.telefono AS telefono, 
                                 siniestro.tipo AS tipo, 
                                 siniestro.monto AS monto, 
                                 siniestro.status AS status, 
                                 siniestro.provincia AS provincia, 
                                 siniestro.direccion AS direccion, 
                                 siniestro.email AS email,  
                                 aseguradora.logo AS logo 
                           FROM 
                                 siniestro, usuarios, aseguradora 
                           WHERE 
                                 siniestro.id_usuario=usuarios.id AND 
                                 siniestro.id_aseguradora=aseguradora.id AND 
                                 siniestro.id='".$this->uri->segment('3')."'");
   if($Sin->num_rows() == 0){
   	redirect(site_url('panel').'/verSiniestros');
   }else{	
      $rowSin = $Sin->row();
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
                     <?php if($rowSin->status==2){ ?>
                          <div class="row">
                           <div class="col-md-12">
                              <div class="alert alert-danger mb-2 text-center" role="alert">
                                 <strong>RECHAZADO!</strong> Elimine este siniestro y cargue de nuevo tomando en cuenta las observaciones.
                              </div>
                              </div>
                           </div>
                           <?php 
                           }
                           ?>
                        <div id="invoice-company-details" class="row">
                           <div class="col-md-6 col-sm-12 text-center text-md-left">
                              <div class="media">
                                 <img src="<?=ASSETS;?>img/<?=$rowSin->logo;?>" height="70" width="100">
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-12 text-center text-md-right">
                              <h5>SINIESTRO</h5>
                              <h3><?=$rowSin->siniestro;?></h3>
                           </div>
                        </div>
                        <div id="invoice-customer-details">
                           <hr>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group pink">
                                    <i class="ft-calendar"></i> <b>Fecha: <?=$rowSin->fecha;?></b> 
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <i class="ft-edit"></i> <b>Tipo:</b> <?=$rowSin->tipo;?>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <i class="ft-map-pin"></i> <b>Provincia:</b> <?=$rowSin->provincia;?>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <i class="ft-map-pin"></i> <b>Dirección:</b> <?=$rowSin->direccion;?>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              
                              <div class="col-md-6">
                                 <div class="form-group">
                                 <i class="ft-phone"></i> <b>Teléfono:</b> <a href="tel:<?=$rowSin->telefono;?>" target="_blank" style="color: #6B6F82;"><?=$rowSin->telefono;?></a>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <i class="ft-mail"></i> <b>Email:</b> <a href="mailto:<?=$rowSin->email;?>" target="_blank" style="color: #6B6F82;"><?=$rowSin->email;?></a>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                           <div class="col-md-12">
                                 <div class="form-group">
                                    <i class="ft-award"></i> <b>Total valor a indemnizar:</b> <?=$rowSin->monto;?> USD$
                                 </div>
                              </div>
                              </div>
                           <hr>
                           <div class="row">
                              <div class="col-md-12">
                                 <?php
                                    $query = $this->db->query("SELECT * FROM arc_siniestro WHERE id_siniestro='".$rowSin->id."'");
                                    $i=0;
                                    foreach ($query->result() as $archivos){
                                    $i++;
                                       echo '<a href="#" data-toggle="modal" data-target="#abrirArchivo-'.$i.'" style="padding:6px;"><img src="'.ASSETS.'img/pdf.png"> ';
                                       $nombreFile = explode('_', $archivos->ruta);
                                       echo $nombreFile[1];
                                       echo '</a><br/>
                                       <div id="abrirArchivo-'.$i.'" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
                                       <div class="modal-dialog modal-full">
                                          <div class="modal-content">
                                          <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          </div>
                                                <div class="modal-body">
                                                <embed src="'.ASSETS.'archivos/'.$archivos->ruta.'#toolbar=0&navpanes=0&scrollbar=0&zoom=90" type="application/pdf" width="100%" height="500px" />
                                                </div>
                                                </div>
                                          </div>
                                       </div>';
                                    }
                                    ?>
                              </div>
                           </div>
                           <?php if($this->session->userdata('gs_rol')==2){?>
                           <hr>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <i class="ft-message-circle"></i> <b>Observaciones:</b> <?=$rowSin->observacion;?></a>
                                 </div>
                              </div>
                           </div>
                           <div class="form-actions" align="center">
                              <a href="<?=site_url('panel')?>/verSiniestros" class="btn btn-info btn-sm"><i class="ft-chevron-left"></i> Atras</a> 
                           </div>
                           <?php 
                           }
                           if($this->session->userdata('gs_rol')==1){
                              if($rowSin->status==0){
                           ?>
                           <hr>
                           <form id="cambiaSiniestro" action="<?=site_url('panel')?>/cambiaSiniestro" class="form" onsubmit="return cambiaSiniestro();" method="post">
                              <div class="row">
                                 <div class="col-md-6 form-group text-center">
                                    <div class="radio radio-info">
                                       <input type="radio" name="txtStatus" id="txtStatus" value="1">
                                       <label for="txtStatus" style="color:#1E9FF2;font-weight:bold;"><i class="ft-check"></i> ENVIAR NOTARIA</label>
                                    </div>
                                 </div>
                                 <div class="col-md-6 form-group text-center">
                                    <div class="radio radio-info">
                                       <input type="radio" name="txtStatus" id="txtStatus" value="2">
                                       <label for="txtStatus" style="color:red;font-weight:bold;"><i class="ft-slash"></i> RECHAZADO</label>
                                    </div>
                                 </div>
                              </div>
                              <div id="datoAprueba" style="display:none;">
                                 <div class="row">     
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="txtValor">Total valor a indemnizar</label>
                                          <input type="text" id="txtValor" name="txtValor" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <label for="txtValor">Contrato Cesion</label>
                                          <input type="file" name="arcCesion" id="arcCesion" class="form-control">
                                       </div>
                                    </div>

                                 </div>        
                              </div>
                              <div id="datoRechaza" style="display:none;">
                                 <div class="row">
                                    <div class="col-md-12 form-group">
                                       <input type="hidden" name="txtIDSin" id="txtIDSin" value="<?=$rowSin->id;?>">
                                       <textarea id="txtObservacion" name="txtObservacion" class="form-control" placeholder="Observaciones"></textarea>
                                    </div>
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
                           <?php 
                              	}
                           }
                           if($this->session->userdata('gs_rol')==3 && $rowSin->status==1){ ?>
                           <form id="enviaFirma" action="<?=site_url('panel')?>/enviaFirma" class="form" onsubmit="return enviaFirma();" method="post">
                           <input type="hidden" name="txtIDSin" id="txtIDSin" value="<?=$rowSin->id;?>">
                           <hr>
                              <div class="row">     
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="txtStatus">Envio de Reconocimiento de Firmas
                                          <input type="checkbox" name="txtStatus" id="txtStatus" class="form-control" value="3"></label>
                                       </div>
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
                           <?php
                           }
                           ?>
                           <?php
                           if($this->session->userdata('gs_rol')==1 && $rowSin->status==3){
                           ?>
                              <form id="cierreSin" action="<?=site_url('panel')?>/cierreSin" class="form" onsubmit="return cierreSin();" method="post">
                           <input type="hidden" name="txtIDSin" id="txtIDSin" value="<?=$rowSin->id;?>">
                           <input type="hidden" name="txtStatus" id="txtStatus" value="4">
                           <hr>
                           <div class="row">     
                           <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="cesion">Cesion Firmada</label>
                                          <input type="file" name="cesion" id="cesion" class="form-control">
                                       </div>
                           </div>
                           <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="firmas">Reconocimiento de Firmas</label>
                                          <input type="file" name="firmas" id="firmas" class="form-control">
                                       </div>
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
                           <?php
                           }
                           ?>
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
            <button type="button" class="btn btn-info btn-sm" data-dismiss="modal" onclick="window.location.href='<?= site_url('panel') ?>/verSiniestros';">Aceptar
            </button>
         </div>
      </div>
   </div>
</div>
<script>
   var $strStatus = $('input[name=txtStatus]').change(function () {
       var strEstado = $strStatus.filter(':checked').val();
       switch(strEstado) {
         case '1':
            $('#datoAprueba').show();
            $('#datoRechaza').hide();
            break;
         case '2':
            $('#datoRechaza').show();
            $('#datoAprueba').hide();
            break;
         default:
             $('#datoRechaza').hide();
             $('#datoAprueba').hide();
            }
   });

function enviaFirma(){
   var ruta  = $('#enviaFirma').attr('action');
   var datos = $('#enviaFirma').serialize();
   $.ajax({
            url: ruta,
            type:'POST',
            data:datos,
            success: function (rep) {
               if(rep=='success'){
                        $('#msg').modal('show'); 
                        $('#icono').html('<i class="ft-alert-circle mt-25" style="font-size:70px;color:#1E9FF2;"></i>'); 
                        $('#alerta').html('<p class="text-center">El reconocimiento de firmas fue enviado</p>');
                  }
            }
         });
            return false;

 }
function cierreSin(){
         var ruta  = $('#cierreSin').attr('action');
         var cesion = document.getElementById('cesion');
			var filecesion = cesion.files[0];
         var firmas = document.getElementById('firmas');
			var filefirmas = firmas.files[0];
			var datap = new FormData();
			datap.append('cesion',filecesion);
         datap.append('firmas',filefirmas);
			datap.append('txtIDSin',$('#txtIDSin').val());
         datap.append('txtStatus',$('#txtStatus').val());
			$.ajax({
				url: ruta,
				type:'POST',
				contentType:false,
				data:datap,
				processData:false,
				cache:false,
				async:true,
				success: function (rep) {
					if(rep=='success'){
                    $('#msg').modal('show'); 
                    $('#icono').html('<i class="ft-alert-circle mt-25" style="font-size:70px;color:#1E9FF2;"></i>'); 
                    $('#alerta').html('<p class="text-center">El siniestro a sido cerrado</p>');
               }
				}
			});
         return false;
   }

function cambiaSiniestro(){
         var ruta  = $('#cambiaSiniestro').attr('action');
      if( document.getElementById('arcCesion').files.length == 0 ){
         var datos = $('#cambiaSiniestro').serialize();
         $.ajax({
            url: ruta,
            type:'POST',
            data:datos,
            success: function (rep) {
               if(rep=='success'){
                        $('#msg').modal('show'); 
                        $('#icono').html('<i class="ft-alert-circle mt-25" style="font-size:70px;color:#1E9FF2;"></i>'); 
                        $('#alerta').html('<p class="text-center">El status del siniestro fue cambiado</p>');
                  }
            }
         });
            return false;
      }else{
			var arcCesion = document.getElementById('arcCesion');
			var fileCesion = arcCesion.files[0];
			var datap = new FormData();
			datap.append('arcCesion',fileCesion);
			datap.append('txtValor',$('#txtValor').val());
			datap.append('txtIDSin',$('#txtIDSin').val());
         datap.append('txtStatus',$('#txtStatus').val());
			$.ajax({
				url: ruta,
				type:'POST',
				contentType:false,
				data:datap,
				processData:false,
				cache:false,
				async:true,
				success: function (rep) {
					if(rep=='success'){
                    $('#msg').modal('show'); 
                    $('#icono').html('<i class="ft-alert-circle mt-25" style="font-size:70px;color:#1E9FF2;"></i>'); 
                    $('#alerta').html('<p class="text-center">El status del siniestro fue cambiado</p>');
               }
				}
			});
			return false;
      }
}
</script>
<?php
   }
}else{
   redirect(site_url('panel').'/verSiniestros');
}
?>