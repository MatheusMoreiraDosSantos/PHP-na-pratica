<!DOCTYPE html>
<html lang="pt-br">
<?php
    include('verifica_login.php');  
?>

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Matheus Moreira">

    <title>Sistema de Notas ao Vivo</title>


    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <b class="navbar-brand mr-1">Sistema de Notas ao Vivo</b>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

<!-- ola usuario -->
      <h5 style="margin-left: 2%; margin-top: 8px" class="text-white bg-dark"><?php echo 'Olá '. $_SESSION['usuario'];?></h5>
      

      <!-- Navbar Search nao utilizado nesta versao do sistema -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-user-circle fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#contaModal">Conta</a>
                   <div class="dropdown-divider">                
                   </div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
            </div>
        </li>
      </ul>
    </nav>

    <div id="wrapper">

      <!-- Sidebar menua a esquerda da pagina  -->
      <ul class="sidebar navbar-nav toggled">
        <li class="nav-item ">
          <a class="nav-link" href="adm.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Administrador</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="oeadm.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Ordem de entrada</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gerardocumento.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Gerar Documentos</span></a>
        </li>
        
      </ul>

      <div id="content-wrapper">
         <div class="card-body">
        <form method="post" >
               <!-- select prova -->
              <div class="input-group">
                <select class="custom-select"  name="provaid"  >
                  <option value="0" selected="">Selecione a categoria</option>
                  <option value="1">NCCR Aberta n2 n3 n4</option>
                  <option value="2">NCCR Aberta n1</option>
                  <option value="3">NCCR Amador n2 n3 n4</option>
                  <option value="4">NCCR Amador n1</option>
                  <option value="5">NCCR Jovem 13</option>
                  <option value="6">NCCR Jovem 15</option>
                  <option value="7">NCCR Jovem 10</option>
                </select>
             <div class="input-group-append">
                <button class="btn btn-outline-secondary"  type="submit">Carregar</button>
             </div>
            </div>
              </form>
                <?php
                       include('conexao.php');
                       //se o select prove estiver alterado  
                      if (isset($_POST['provaid'])) {
                        
                      
                      $prova=$_POST['provaid'];                   
                      $query =("select draw, exh, provanome, provacategoria, cavaleiro, proprietario, animal, nivel1, nivel2, nivel3, nivel4, cidade from conjunto inner join prova on conjunto.provaid=prova.provaid
                        where conjunto.provaid='$prova';") or die(mysql_error());
                      $result = mysqli_query($conexao,$query);
                      
                  ?>
                   <div class="table-responsive">
                <table class="table table-striped">

                  <!-- show dados -->
                      <thead>
                        <tr>
                          <th scope="col">DRAW</th>
                          <th scope="col">EXH#</th>
                          <th scope="col">Cavaleiro/Amazona</th>
                          <th scope="col">Animal</th>
                          <th scope="col">Proprietário</th>
                          <th scope="col">Cidade, UF</th>
                          <th scope="col">Nível 1</th>
                          <th scope="col">Nível 2</th>
                          <th scope="col">Nível 3</th>
                          <th scope="col">Nível 4</th>
                          

                        </tr>
                      </thead>
                      <tbody>
                        <!-- linha 1--><?php
                    
                        while ($dados = mysqli_fetch_assoc($result)) {
                          
                        
                        ?>
                        <tr>
                          <td><h5><?php echo $dados['draw'];?></h5></td>
                          <td><h5><?php echo $dados['exh'];?></h5></td>
                         <td><h5><?php echo $dados['cavaleiro'];?></h5></td>
                           <td>
                            <h5><?php echo $dados['animal'];?></h5>
                            </td>
                           <td>
                            <h5><?php echo $dados['proprietario'];?></h5>
                            </td>
                           <td>
                            <h5><?php echo $dados['cidade'];?></h5>
                            </td>
                            <td>
                            <h2><?php 
                             if($dados['nivel1']==1){
                             echo '<img src="img/check.jpg" width="20px">';
                            }
                            ?></h2>
                            </td>
                           <td>
                            <h2><?php 
                            if($dados['nivel2']==1){
                             echo '<img src="img/check.jpg" width="20px">';
                            }?></h2>
                            </td>
                            <td><h2>
                            <?php 
                            if($dados['nivel3']==1){
                             echo '<img src="img/check.jpg" width="20px">';
                            }?></h2>
                            </td>
                            <td><h2>
                            <?php 
                            if($dados['nivel4']==1){
                             echo '<img src="img/check.jpg" width="20px">';
                            }?></h2>
                            </td>
                            <td>
                              
                            </td>
                                                   
                        </tr>
                      <?php }}?>
                      </tbody>
                    </table>
              </div>
            </div>

          

      
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer" style="background-color: white; width: 80%;">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Sistema de Notas ao Vivo</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecione "SAIR" abaixo se você estiver pronto para terminar sua sessão atual.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">CANCELAR</button>
            <a class="btn btn-primary" href="sair.php">SAIR</a>
          </div>
        </div>
      </div>
    </div>
<!-- conta Modal-->
    <div class="modal fade" id="contaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h5 class="text-dark"><?php 
           
            $nomeusuario = $_SESSION['usuario'];
            $queryemail=("select usuarioemail, usuarioid from usuario where usuarionome='$nomeusuario';") or die(mysql_error());
            echo 'Sua conta, '. $_SESSION['usuario'];
            $email = mysqli_query($conexao, $queryemail);
            $resultemail = mysqli_fetch_assoc($email);

            echo '<br>   O seu E-mail esta como : '.$resultemail['usuarioemail'];


            ?></h5><center>
          </div>
          <div class="modal-footer" >
           <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#alterarnome" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">Alterar Nome</span>
            </button>
            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#alterarsenha" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">Alterar Senha</span>
            </button>
            <button  class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#apagaconta" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">Apagar Conta</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- alterar nome Modal-->

    <div class="modal fade" id="alterarnome" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Quase lá :)</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
        
          <form method="POST" action="alteranome.php">
            <div class="modal-footer">
            
            <input type="text"  id="nome" name="nome" class="form-control" placeholder="Digite o seu nome atual" required="required" autofocus="autofocus">
            
            <input type="text"  id="novonome" name="novonome" class="form-control" placeholder="Digite o Seu Novo Nome" required="required" autofocus="autofocus">
  
              </div>
              <button class="btn btn-primary btn-block" type="submit">Alterar</button>
            </form>
          </div>

          

        </div>
      </div>
    

      <!-- modal altera senha  -->

    <div class="modal fade" id="alterarsenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Quase lá :)</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
        
          <form method="POST" action="alterasenha.php">
            <div class="modal-footer">
            
            <input type="text"  id="senha" name="senha" class="form-control" placeholder="Digite sua senha atual" required="required" autofocus="autofocus">
            
            <input type="text"  id="novasenha" name="novasenha" class="form-control" placeholder="Digite sua nova senha" required="required" autofocus="autofocus">
            
          
              </div>
              <button class="btn btn-primary btn-block" type="submit">Alterar</button>
              </form>
          </div>
          

        </div>
      </div>

        <!-- modal apagar conta  -->

   <div class="modal fade" id="apagaconta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Quase lá :(</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Deseja REALMENTE apagar sua conta?</div>
          
          <form method="POST" action="apagaconta.php">
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">CANCELAR</button>
            <input type="hidden" name="apagar" id="apagar" value="1">
            <input type="hidden" name="nomedousuario" value="<?=$_SESSION['usuario']?>">
            <button class="btn btn-primary" type="submit">Sim, APAGAR</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>



  </body>

</html>