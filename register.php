<?php
session_start();
require_once('bd/conexão.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!--peguei de Lavinia-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <!--link rel="shortcut icon" href="images/favicon.png" /-->
</head>
<style>
  @media (min-width: 992px){
      .cadastro-body{
        flex: 0%!important;
        max-width: initial!important;
      }
}
</style>
<body>
  <form action="pages/validar_cadastro.php" method="POST">
    <div class="container-scroller">
      <div class="container-fluid container-fluid-body page-body-wrapper full-page-wrapper" style="display: flex; justify-content: center; align-items: center; background: #F5F7FF; width: 100%!important;">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto cadastro-body">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="images/Component1Logo.svg" alt="logo">
                </div>
                <h4>Novo aqui?</h4>
                <h6 class="font-weight-light">A inscrição é fácil. Leva apenas alguns passos</h6>
                <form class="pt-3">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="nome" id="exampleInputUsername1" placeholder="Usuário">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" name="email" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="senha" id="exampleInputPassword1" placeholder="Senha">
                  </div>
                  <!--div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirmar Senha">
                  </div-->
                  <!--div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">
                        Eu concordo com todos os Termos e Condições
                      </label>
                    </div>
                  </div-->
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">INSCREVER-SE</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light">
                    Já tem uma conta? <a href="login.php" class="text-primary">Entrar</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
  </form>
</body>

</html>
