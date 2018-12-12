<div class="app-content content">
<div class="content-wrapper">
   <section id="configuration">
      <div class="row">
         <div class="col-3">&nbsp;</div>
         <div class="col-6">
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
                        <form id="cambiaClave" action="<?=site_url('panel')?>/cambiaClave" class="form" onsubmit="return cambiaClave();" method="post">
                        <input type="hidden" id="txtIDUsuario" name="txtIDUsuario" value="<?=$this->session->userdata('gs_id');?>">
                        <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="txtSiniestro">Nueva Clave</label>
                                    <input type="text" id="txtClave" name="txtClave" class="form-control" required>
                                 </div>
                              </div>
                           </div> 
                           <div class="form-actions text-center"> 
                              <a href="<?=site_url('panel')?>/perfil" class="btn btn-info btn-sm"><i class="ft-chevron-left"></i> Atras</a>              
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
            <div class="col-3">&nbsp;</div>
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
				<button type="button" class="btn btn-info btn-sm" data-dismiss="modal" onclick="window.location.href='<?=site_url('panel')?>/perfil';">Aceptar</button>
			</div>
	    </div>
	</div>	
</div>	
<script>
	$('form').submit(function() {
	  $(this).find("button[type='submit']").prop('disabled',true);
	});
	function cambiaClave(){
		var ruta = $("#cambiaClave").attr("action");
    var datos = $("#cambiaClave").serialize();
    $('#message').hide();
	$.ajax({
		url: ruta,
		type:'POST',
    data:datos,
    processData:false,
		cache:false,
		async:true,
		success: function (rep) {
      if(rep=='success'){
      $('#msg').modal('show'); 
			$('#icono').html('<i class="ft-alert-circle mt-25" style="font-size:70px;color:#1E9FF2;"></i>'); 
			$('#alerta').html('<p class="text-center">Su clave fue actualizada</p>');
      }
		}
	});
		return false;
	}
</script>