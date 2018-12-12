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
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                 <b>Nombre:</b> <?=$this->session->userdata('gs_nombres');?>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                 <b>Apellido:</b> <?=$this->session->userdata('gs_apellidos');?>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                 <b>Cedula:</b> <?=$this->session->userdata('gs_cedula');?>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                 <b>Rol:</b>    <?php
                                                    switch ($this->session->userdata('gs_rol')) {
                                                        case 1:
                                                            echo 'Administrador';
                                                            break;
                                                        case 2:
                                                            echo 'Asegurador';
                                                            break;
                                                        case 3:
                                                            echo 'Notario';
                                                            break;
                                                    }
                                                    ?>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                 <b>Email:</b> <?=$this->session->userdata('gs_email');?>
                                 </div>
                              </div>
                           </div>
                           <div class="form-actions text-center">                            
                              <a href="<?=site_url('panel')?>/" class="btn btn-info btn-sm"><i class="ft-chevron-left"></i> Atras</a>              
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <a href="<?=site_url('panel')?>/cambiarClave" class="btn btn-info btn-sm"><i class="ft-edit-2"></i> Cambiar Clave</a>
                           </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-3">&nbsp;</div>
         </div>
   </section>
   </div>
</div>
	
<script>

</script>