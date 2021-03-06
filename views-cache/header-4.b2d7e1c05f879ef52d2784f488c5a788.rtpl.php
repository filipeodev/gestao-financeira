<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
  <link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../../assets/img/favicon.png">
	<title><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../../../res/js/fontawesome.js">
  <link href="../../../res/css/style.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../../../res/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../../../res/css/demo.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<!-- <link rel="stylesheet" href="../../../res/bootstrap/css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="../../../res/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../res/css/style.css">
  <link rel="stylesheet" href="../../../res/css/all.css"> -->
  <script src="../../../res/js/sweetalert.js"></script>
</head>
<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../../../res/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Fili Economy
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="/financas">
              <i class="material-icons">content_paste</i>
              <p>Finanças</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/usuario" title="Usuário">
              <i class="material-icons">person</i>
              <p>Usuário</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/sair" title="Sair">
              <i class="material-icons">logout</i>
              <p>Sair</p>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="./tables.html">
              <i class="material-icons">content_paste</i>
              <p>Table List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./typography.html">
              <i class="material-icons">library_books</i>
              <p>Typography</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
              <i class="material-icons">bubble_chart</i>
              <p>Icons</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li> -->
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <!-- <div class="navbar-wrapper">
            <a class="navbar-brand" href="/home" title="Início">Início</a>
          </div> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <!-- <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form> -->
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Notificação">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Notificação
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="javascript:void(0)" title="Mike John responded to your email">Mike John responded to your email</a>
                  <a class="dropdown-item" href="javascript:void(0)" title="You have 5 new tasks">You have 5 new tasks</a>
                  <a class="dropdown-item" href="javascript:void(0)" title="You're now friend with Andrew">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="javascript:void(0)" title="Another Notification">Another Notification</a>
                  <a class="dropdown-item" href="javascript:void(0)" title="Another One">Another One</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/usuario" title="Usuário">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Usuário
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/sair" title="Sair">
                  <i class="material-icons">logout</i>
                  <p class="d-lg-none d-md-block">
                    Sair
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>