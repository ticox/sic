<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php if(isset($this->titulo)) echo $this->titulo; ?></title>
  
    <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>public/img/favicon.png">
    <link href="<?php echo BASE_URL; ?>public/css/alertify.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL; ?>public/css/alertify.core.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo BASE_URL; ?>public/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo BASE_URL; ?>public/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL; ?>public/css/jquery-ui.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo BASE_URL; ?>public/css/jquery-ui.structure.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo BASE_URL; ?>public/css/jquery-ui.theme.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL; ?>public/css/default_modal.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo BASE_URL; ?>public/css/component_modal.css" rel="stylesheet" type="text/css" />
     <link href="<?php echo BASE_URL; ?>public/css/barcode-laser.css" rel="stylesheet" type="text/css" />
    
    
    <link href="<?php echo $_layoutParams['ruta_css']; ?>layout.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_layoutParams['ruta_css']; ?>botones.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_layoutParams['ruta_css']; ?>estilos_varios.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $_layoutParams['ruta_css']; ?>formulario.css" rel="stylesheet" type="text/css" />
   
    <?php if(isset($_layoutParams['css']) && count($_layoutParams['css'])): ?>
        <?php for($i=0; $i < count($_layoutParams['css']); $i++): ?>
            <link href="<?php echo $_layoutParams['css'][$i] ?>" rel="stylesheet" type="text/css" />
        <?php endfor; ?>
    <?php endif; ?> 
</head>

<body id="page-top">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            Brand and toggle get grouped for better mobile display
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo BASE_URL; ?>principal" class="navbar-brand">Inicio</a>
            </div>

            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul id="menu" class="nav navbar-nav">
                        <?php if(isset($_layoutParams['menu'])): ?>
                            <?php for($i = 0; $i < count($_layoutParams['menu']); $i++): ?>
                           

                            <li ><a class="enlace-menu" href="<?php echo BASE_URL.$_layoutParams['menu'][$i]['enlace']; ?>"><b><?php  echo $_layoutParams['menu'][$i]['titulo']; ?></b></a></li>

                            <?php endfor; ?>
                            <?php endif; ?>

                    </ul>
                    <?php if (session::get('autenticado')): ?>
                    <ul  class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo session::get('usuario'); ?><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo BASE_URL; ?>recuperar/cambiar">CAMBIAR CONTRASEÑA</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo BASE_URL; ?>login/cerrar">CERRAR SESIÓN</a></li>
                                </ul>
                         </li>
                    </ul>
                <?php endif; ?>

                  

                </div>
            </div>
    </nav>

    <div class="container-fluid fondo">

    <div id="logos" class="col-md-10 col-md-offset-1">
    <img src="<?php echo BASE_URL ?>public/img/formato.png" class="img img-responsive" >
    </div>
    <div id="linea" class="row"></div>

    <div class="row">
 -->
 <!--==========================
    New lyout - Nueva plantilla.
  ============================-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> SIC - COTEDEM </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Main Stylesheet File -->
  <link rel="stylesheet" href="<?php echo BASE_URL ?>css/main.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>css/bootstrap-material-design.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>css/ripples.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>css/sweetalert2.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>css/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>css/material-design-iconic-font.min.cs">


<link rel="stylesheet" href="<?php echo BASE_URL ?>fonts/robotocondensed-light.eot">
<link rel="stylesheet" href="<?php echo BASE_URL ?>fonts/robotocondensed-light.eot?#iefix">
<link rel="stylesheet" href="<?php echo BASE_URL ?>fonts/robotocondensed-light.woff2">
<link rel="stylesheet" href="<?php echo BASE_URL ?>fonts/robotocondensed-light.ttf">
<link rel="stylesheet" href="<?php echo BASE_URL ?>fonts/robotocondensed-light.svg">

</head>

<body class="cover" style="background-image: url(<?php echo BASE_URL ?>img/loginFont.jpg);">
  <div class="loader"></div>

  <!--==========================
    Header
  ============================-->

<?php if (session::get('autenticado')): ?>
<section class="full-box cover dashboard-sideBar">
    <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
    <div class="full-box dashboard-sideBar-ct">
      <!--SideBar Title -->
      <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
        COTEDEM <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
      </div>
      <!-- SideBar User info -->
      <div class="full-box dashboard-sideBar-UserInfo">
        <figure class="full-box">
          <img src="<?php echo BASE_URL ?>img/avatar.jpg" alt="UserIcon">
          <figcaption class="text-center text-titles">User: Gvargas</figcaption>
          <figcaption class="text-center text-titles">Name: Gilberto Vargas</figcaption>
        </figure>
        <ul class="full-box list-unstyled text-center">
          <li>
            <a href="#!">
              <i class="zmdi zmdi-settings"></i>
            </a>
          </li>
          <li>
            <a href="#!" class="btn-exit-system">
              <i class="zmdi zmdi-power"></i>
            </a>
          </li>
        </ul>
      </div>
      <!-- SideBar Menu -->
      <ul class="list-unstyled full-box dashboard-sideBar-Menu">
        <li>
          <a href="<?php BASE_URL ?>info">
            <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Mi Informacion
          </a>
        </li>
        <li>
          <a href="#!" class="btn-sideBar-SubMenu">
            <i class="zmdi zmdi-case zmdi-hc-fw"></i> Administration <i class="zmdi zmdi-caret-down pull-right"></i>
          </a>
          <ul class="list-unstyled full-box">
            <li>
              <a href="period.html"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> Period</a>
            </li>
            <li>
              <a href="subject.html"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Subject</a>
            </li>
            <li>
              <a href="section.html"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Section</a>
            </li>
            <li>
              <a href="salon.html"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Salon</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#!" class="btn-sideBar-SubMenu">
            <i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Users <i class="zmdi zmdi-caret-down pull-right"></i>
          </a>
          <ul class="list-unstyled full-box">
            <li>
              <a href="admin.html"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Admin</a>
            </li>
            <li>
              <a href="teacher.html"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Teacher</a>
            </li>
            <li>
              <a href="student.html"><i class="zmdi zmdi-face zmdi-hc-fw"></i> Student</a>
            </li>
            <li>
              <a href="representative.html"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Representative</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#!" class="btn-sideBar-SubMenu">
            <i class="zmdi zmdi-card zmdi-hc-fw"></i> Payments <i class="zmdi zmdi-caret-down pull-right"></i>
          </a>
          <ul class="list-unstyled full-box">
            <li>
              <a href="registration.html"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Registration</a>
            </li>
            <li>
              <a href="payments.html"><i class="zmdi zmdi-money zmdi-hc-fw"></i> Payments</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#!" class="btn-sideBar-SubMenu">
            <i class="zmdi zmdi-shield-security zmdi-hc-fw"></i> Settings School <i class="zmdi zmdi-caret-down pull-right"></i>
          </a>
          <ul class="list-unstyled full-box">
            <li>
              <a href="school.html"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> School Data</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </section>

  <!-- Content page-->
  <section class="full-box dashboard-contentPage">
    <!-- NavBar -->
    <nav class="full-box dashboard-Navbar">
      <ul class="full-box list-unstyled text-right">
        <li class="pull-left">
          <a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
        </li>
        <li>
          <a href="#!" class="btn-Notifications-area">
            <i class="zmdi zmdi-notifications-none"></i>
            <span class="badge">7</span>
          </a>
        </li>
        <li>
          <a href="#!" class="btn-search">
            <i class="zmdi zmdi-search"></i>
          </a>
        </li>
        <li>
          <a href="#!" class="btn-modal-help">
            <i class="zmdi zmdi-help-outline"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- Content page -->
<?php endif; ?>

</div class="container">
