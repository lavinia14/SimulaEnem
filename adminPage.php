<?php
  require_once('bd/conexão.php');
  require_once('pages/getProva.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Página do Administrador</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logoSE.svg">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="home.html"><img src="images/Component1Logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="home.html"><img src="images/Component2MiniLogo.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <div class="barra">
            
                <div class="barra-diretorio">
                    <a class="btn btn-primary card-table-link" href='index.php'>Logout</a>
                    <a class="btn btn-primary card-table-link" href="homeAdmin.php">Acessar Provas</a>
                </div>
            </div>
        </div>
        
       
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      

        <div class="main-panel">
          <div class="content-wrapper content-wrapper-body">
            <div class="row content-wrapper-row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h2 class="font-weight-bold">Esta é sua página de administração</h2><br>
                    <button class="btn btn-primary card-table-link"><a href="addPerguntas.php"><h4>Cadastrar pergunta</h4></button>
                    <button type="button" class="btn btn-primary card-table-link"><a href="homeAdmin.php"><h4>Editar pergunta</h4></a></button><br><br><br>
                    <button type="button" class="btn btn-primary card-table-link"><a href="addProva.php"><h4>Cadastrar prova</h4></a></button><br><br><br>
                    <button type="button" class="btn btn-primary card-table-link"><a href="addSemana.php"><h4>Cadastrar dia da semana</h4></a></button><br><br><br>
                  </div>
                </div>
              </div>  
          </div>
          <div class="row content-wrapper-row">
            <div class="col-md-6 grid-margin stretch-card content-wrapper-img">
                  <img src="images/dashboard/Hand coding-amico.svg" alt="people">
            </div>
          </div>  
        </div>
        <!-- content-wrapper ends -->
        
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>