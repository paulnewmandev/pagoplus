<body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu" data-col="1-column">
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <img src="<?=ASSETS;?>img/brand.png" alt="GESDOC">
                    </div>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                  <form id="acceder" action="<?=site_url('login')?>/verificar" onsubmit="return acceder();" method="post">
                  <div id="message" class="alert alert-danger text-center" role="alert">
											  <i class="fa fa-exclamation-triangle" style="font-size:20px;"></i> <br/> Usuario y/o clave invalido
											</div>
                      <fieldset class="form-group position-relative has-icon-left mb-0">
                        <input type="email" class="form-control form-control-lg input-lg" placeholder="Email" id="txtEmail" name="txtEmail" required>
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </fieldset>
                      <br/>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control form-control-lg input-lg" placeholder="Contraseña" id="txtClave" name="txtClave" required>
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                      </fieldset>
                      <button id="submit" type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Entrar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <script>
	$('#message').hide();
	function acceder(){
		var ruta = $("#acceder").attr("action");
		var datos = $("#acceder").serialize();
	$.ajax({
		url: ruta,
		type:'POST',
		data:datos,
    processData:false,
		cache:false,
		async:true,
		success: function (rep) {
      if(rep=='success'){
        window.location.href='<?=site_url('panel');?>';
      }else{
				$('#message').show();
				$('#message').delay(8000).hide(600);
			}
		}
	});
		return false;
	}
</script>