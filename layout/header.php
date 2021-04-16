<?php include 'koneksi.php'; ?>
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-alpha.18
* @link https://tabler.io
* Copyright 2018-2020 The Tabler Authors
* Copyright 2018-2020 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Telkom Cat Rescue</title>
    <!-- CSS files -->
    <link href="assets/libs/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <link href="assets/css/tabler.css" rel="stylesheet"/>
    <link href="assets/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="assets/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="assets/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="assets/css/demo.min.css" rel="stylesheet"/>
  </head>
  <body class="antialiased bg-white">
    <div class="page">
      <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
              Telkom Cat Rescue
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
           
              <?php 
                if(isset($_SESSION['login'])){ ?>
                 <div class="nav-item dropdown">
                  <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(assets/img/paw.jpg)"></span>
                    <div class="d-none d-xl-block ps-2">
                      <div><?= $_SESSION['login_data']['nama'] ?></div>
                      <div class="mt-1 small text-muted"><?= ucfirst($_SESSION['login_data']['akses']) ?></div>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <?php if($_SESSION['login_data']['akses'] == 'user'){ ?>

                      <a href="daftar_kucing.php" class="dropdown-item">Tambah Iklan Adopsi</a>
                      <a href="daftar_adopsi.php" class="dropdown-item">Daftar Adopsi</a>
                      <div class="dropdown-divider"></div>

                    <?php }else{ ?>

                      <a href="dashboard_admin.php" class="dropdown-item">Dashboard</a>
                      <a href="daftar_kucing.php" class="dropdown-item">Daftar Iklan Adopsi</a>

                    <?php } ?>
                    
                    <a href="account.php" class="dropdown-item">Profile & account</a>
                    <a href="proses/logout.php" class="dropdown-item">Logout</a>
                  </div>

              </div>

              <?php }else{ ?>
                <a href="register.php" class="btn btn-outline-primary">DAFTAR SEKARANG</a> &emsp;
                <a href="login.php" class="btn btn-primary">LOGIN</a>
              <?php } ?>
              
          </div>

        </div>
      </header>
      <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar navbar-light">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Home
                    </span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="cari_kucing.php" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Cari Kucing
                    </span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="tentang_kami.php" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="6" height="5" rx="2" /><rect x="4" y="13" width="6" height="7" rx="2" /><rect x="14" y="4" width="6" height="7" rx="2" /><rect x="14" y="15" width="6" height="5" rx="2" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Tentang Kami
                    </span>
                  </a>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container-xl">
          <!-- Page title -->
          
