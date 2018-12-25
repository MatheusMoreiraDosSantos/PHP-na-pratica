<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de Notas ao Vivo - Entrar</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Entrar</div>
        <div class="card-body">
          <form action="login.php" method="post">
            <?php
            if(isset($_SESSION['nao_autenticado'])):
            ?>
            <div class="alert alert-danger" role="alert">
              SENHA OU USUÁRIO INCORRETOS!
            </div>
            <?php
            endif;
            unset($_SESSION['nao_autenticado']);
            ?>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text"  id="inputnome" name="usuario" class="form-control" placeholder="Nome" required="required" autofocus="autofocus">
                <label for="inputnome">Nome</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Senha</label>
              </div>
            </div> 
            
            <button class="btn btn-primary btn-block" type="submit">Entrar</button>
               
            
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="cadastrar.html">Cadastrar uma conta</a>
            <a class="d-block small" href="esqueciasenha.html">Esqueci minha senha</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
