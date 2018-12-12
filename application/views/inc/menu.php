<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow">
      <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="<?=site_url('panel');?>">
            <img src="<?=ASSETS;?>img/brand-logo.png" alt="PAGO PLUS">
              <h1 class="brand-text"><img src="<?=ASSETS;?>img/brand-head.png" alt="PAGO PLUS"></h1>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">@<?=$this->session->userdata('pp_nombre').' '.$this->session->userdata('pp_apellido');?> <i class="ficon ft-chevron-down"></i></span>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?=site_url('panel').'/perfil';?>"><i class="ft-user"></i>Mi Perfil</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="<?=site_url('panel').'/salir';?>"><i class="ft-power"></i> Salir</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

	
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" nav-item"><a href="#"><i class="ft-alert-triangle"></i><span class="menu-title">Siniestros</span></a>
          <ul class="menu-content">
          <?php if($this->session->userdata('gs_rol')==2){?>
            <li><a class="menu-item" href="<?=site_url('panel').'/nuevoSiniestro';?>">Nuevo</a></li>
            <?php } ?>
            <li><a class="menu-item" href="<?=site_url('panel').'/verSiniestros';?>">Ver Todos</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>