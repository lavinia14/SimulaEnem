<?php
session_start();
require_once('bd/conexão.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Adicionar perguntas</title>
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
    <link rel="shortcut icon" href="images/logoSE.svg">
</head>
<style>
    @media (min-width: 992px) {
        .cadastro-body {
            flex: 0% !important;
            max-width: initial !important;
        }
    }
</style>

<body>
    <form action="pages/ValidarPerguntas.php" method="POST" enctype="multipart/form-data">
        <div class="container-scroller">
            <div class="container-fluid container-fluid-body page-body-wrapper full-page-wrapper" style="display: flex; justify-content: center; align-items: center; background: #F5F7FF; width: 100%!important;">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto cadastro-body">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                <h4>Cadastro de questões:</h4>
                                <h6 class="font-weight-light">Adicione sua pergunta!</h6>
                                <div class="pt-3">
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" name="titulo" id="" placeholder="Título da questão">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" name="id" id="" placeholder="Id da questão: númeroquestãoAno (ex: 12015)">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" name="texto" id="" placeholder="Texto da questão">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" name="idProvas" id="" placeholder="IdSemana: semana(1/2)AnoProva (ex: 12015)">
                                    </div>

                                    <div class="form-group">
                                        <input type="file" class="form-control form-control-lg" name="imagem" id="imagem">
                                    </div>

                                    <div class="form-group">
                                        <select name="areaConhecimento" class="form-control form-control-lg" placeholder="Area de Conhecimento">
                                            <option value="Linguagens">Linguagens, códigos e suas tecnologias</option>
                                            <option value="Ciências humanas">Ciências humanas e suas tecnologias</option>
                                            <option value="Ciências da Natureza">Ciências da natureza e suas tecnologias</option>
                                            <option value="Matemática">Matemática suas tecnologias</option>
                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">CADASTRAR PERGUNTA</button>
                                    </div>
                            </div>
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