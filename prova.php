<?php
  require_once('bd/conexão.php');
  require_once('pages/getProvas.php');
  require_once('pages/getPerguntas.php');
  $idProva = isset($_GET['id'])? $_GET['id']: 0;
  $prova = new GetProvas($idProva);
  $perguntas = new GetPerguntas();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Simula Enem</title>
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
  <!--link rel="shortcut icon" href="images/favicon.png" /-->
  <link rel="stylesheet" href="css/style.css?ver=1.0.0.2">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="#"><img src="images/Component1Logo.svg" class="mr-2"
            alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="images/Component2MiniLogo.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <!--ul class="navbar-nav mr-lg-2">
         tirei o search daqui
        </ul-->
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <div id="timer">Cronometro</div>

          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
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
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
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
      <!--div id="right-sidebar" class="settings-panel">
        tirei coisa daqui
      </div-->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="home.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="index.php"> Logout </a></li>
                <li class="nav-item"> <a class="nav-link" href="#"> Settings </a></li>
              </ul>
            </div>
          </li>
          <!--li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li-->
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">

            </div>
          </div>
          <div class="card-table-column-father">



          <div class="container-provas">
            <?php
              if(count($perguntas->perguntas($idProva)) > 0){
            ?>
            <form action="acertos.php" method="post">
            <?php
            $cont = 1;
            foreach($perguntas->perguntas($idProva) as $value){
              echo '<div class="container-perguntas">';
              echo '<div class="pergunta-conteudo">'.  $value['titulo'] .'</div>';
              if(file_exists('images/upload/'.  $value['imagem'] .'')){
                echo '<div class="pergunta-conteudo"><img src="images/upload/'.  $value['imagem'] .'" alt="foto"></div>';
              }
              echo '<div class="pergunta-conteudo">'.  $value['texto'] .'</div>';
              

              $contTwo = 1;
              foreach($perguntas->alternativas($value['id']) as $key => $valueAlternativa){
                echo '<div class="respostas-conteudo"><ul><li><input required type="radio" value="'.$valueAlternativa['id'].'" name="pergunta-'. $value['id'] .'" id="resposta-id-'.$valueAlternativa['id'].'-'.$contTwo.'"><label for="resposta-id-'.$valueAlternativa['id'].'-'.$contTwo.'">'.$valueAlternativa['resposta'].'</label></li></ul></div>';
                $contTwo++;
              }
              $cont++;
              echo '<div><a href="editar.php?id='. $value['id'] .'">Editar</a></div>';
              echo '</div>';
            }        
            ?>
            <button>Enviar</button>
            </form>
            <?php
              }else{
                echo '<p>Não conseguimos encontrar nenhuma prova em nosso sistema. <a href="home.php">Voltar pra tela inicial</a></p>';
              }
            ?>
            
          </div>



          </div>
          <!---div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                  tirei coisas daqui
            </div>
          </div-->
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card">
                <!--div class="card-body">
                  tirei coisas daqui
                  </div-->
              </div>
            </div>
          </div>
          <!--div class="col-md-4 stretch-card grid-margin">
              <div class="row">
               tirei coisas daqui
            </div-->
          <div class="col-md-4 stretch-card grid-margin">
            <!--div class="card">
                tirei coisas daqui    
              </div-->
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

              <!--div class="card-body">
                  tirei coisas daqui
                </div-->


            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <!-- partial -->
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
  <script src="js/contadorRegressivo.js" defer></script>

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