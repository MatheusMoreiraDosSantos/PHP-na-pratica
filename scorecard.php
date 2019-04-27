<!DOCTYPE html>
<html lang="pt-br">
  
<?php
  include('verifica_login.php');/*inclue o arquivo php que é responsavel por verificar o login*/
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

<!-- tag : olá $usuario; -->
  <h5 style="margin-left: 2%; margin-top: 8px" class="text-white bg-dark"><?php echo 'Olá '.$_SESSION['usuario'];?></h5> 
      
  <!-- Navbar Search nao utilizada nesta versao do sistema-->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
        </div>
      </form>

      <!-- Navbar conta e sair-->
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
      <div id="content-wrapper">
        <div class="container-fluid">
          <!-- inicio tabela -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              <strong>Score Card</strong>
            </div>
            <div class="card-body">             
              <form method="post" >              
               <div class="input-group">
          <!--  select prova -->
                  <select class="custom-select btn btn-primary" id="select"  name="provaid"  >
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
                <button class="btn btn-primary"  style="submit">Carregar</button>
             </div>
            </div>
              </form>
                          
              <?php
                  include('conexao.php');
              // se prova estiver alterada           
                    if (isset($_POST['provaid'])) {
                     
                      $prova=$_POST['provaid'];      // dados por post

                      //query conjuntos             
                      $query =("select draw, exh, provanome, conjuntoid, provacategoria from conjunto inner join prova on conjunto.provaid=prova.provaid
                        where conjunto.provaid='$prova';") or die(mysql_error());
                      //query prova nome e categoria
                      $querynome =("select provanome, provacategoria from conjunto inner join prova on conjunto.provaid=prova.provaid
                        where conjunto.provaid='$prova';") or die(mysql_error());

                      $resultado = mysqli_query($conexao,$query); //executa a query
                      $result = mysqli_query($conexao,$querynome); //executa a query
                      $nome = mysqli_fetch_assoc($result);     //trata os dados


              ?>
                  <!-- tag center: mostra o nome da categoia -->
               <center><h4><?php   echo $nome['provanome']; echo " "; echo $nome['provacategoria'];?></h4></center>
      <!--  inicio table responsive -->
              <div class="table-responsive">
                <table class="table table-striped"> 
                      <thead>
                        <tr>
                            <th scope="col">
                        <!--  select percurso javascript -->
                              <select  style="height:40px" class="btn btn-primary" onclick="percursos();" id="selectpercurso" >
                                    <option value="0" selected="">Percurso</option>
                                    <option id="1" value="1">1</option>
                                    <option id="2" value="2">2</option>
                                    <option id="3" value="3">3</option>
                                    <option id="4" value="4">4</option>
                                    <option id="5" value="5">5</option>
                                    <option id="6" value="6">6</option>
                                    <option id="7" value="7">7</option>
                                    <option id="8" value="8">8</option>
                                    <option id="9" value="9">9</option>
                                    <option id="10" value="10">10</option>
                                    <option id="11" value="11">11</option>
                                    <option id="12" value="12">12</option>
                                    <option id="13" value="13">13</option>
                                    

                                </select> 
                            </th>
                                
                          <th scope="col"></th>
                          <th scope="col">MANEUVER <br>DESCRIPTION</th>
                          <th scope="col" id="manobra1"></th>
                          <th scope="col" id="manobra2"></th>
                          <th scope="col" id="manobra3"></th>
                          <th scope="col" id="manobra4"></th>
                          <th scope="col" id="manobra5"></th>
                          <th scope="col" id="manobra6"></th>
                          <th scope="col" id="manobra7"></th>
                          <th scope="col" id="manobra8"></th>

                          <th scope="col"></th>
                          
                        </tr>
                        <tr>
                          <th scope="col">DRAW</th>
                          <th scope="col">EXH#</th>
                          <th scope="col">MANEUVER</th>
                          <th scope="col">1</th>
                          <th scope="col">2</th>
                          <th scope="col">3</th>
                          <th scope="col">4</th>
                          <th scope="col">5</th>
                          <th scope="col">6</th>
                          <th scope="col">7</th>
                          <th scope="col">8</th>
                          <th scope="col"></th>

                        </tr>
                      </thead>
                      <tbody>
                        <!-- linha 1--><?php
                        //x é um contador para diferenciar os id
                        $x = 0;

                        //loop para mostrar os campos
                        while ($dados = mysqli_fetch_assoc($resultado)) {
                        $x++;
                        
                        ?>
                       
                        <tr>
                          <td><h5><?php echo $dados['draw'];?></h5></td>
                          <td><h5><?php echo $dados['exh'];?></h5></td>
                         <td><strong>PENALTY<br><br>SCORE</strong></td>
                         <td>
            <!--  form1 -->
                         <form id="form1-<?=$x?>" onsubmit="return salvanota1(<?=$x?>);">
                          
                          <input type="hidden" name="usuario" value="<?=$_SESSION['usuario']?>">
                      
                          <input type="hidden" type="number" name="conjuntoid" value="<?=$dados['conjuntoid']?>">
                              
                            <input type="number"  step="0.5" id="penalidade1" name="penalidade1" style="width: 72px; height: 40px"><br>

                            <select type="number"  id="manobra1" name="manobra1" style="height:40px;width: 72px;">
                                    <option value="1.5">+1 1/2</option>
                                    <option value="1">+1</option>
                                    <option value="0.5">+1/2</option>
                                    <option value="0" selected="">0</option>
                                    <option value="-0.5">-1/2</option>
                                    <option value="-1">-1</option>
                                    <option value="-1.5">-1 1/2</option>

                                </select><br>
                           <input type="submit" class="btn btn-primary"  style="width: 72px" id="salva1" value="Salvar">
                         </form>
                            </td>
                           <td>
            <!--  form2 -->         
                          <form id="form2-<?=$x?>" onsubmit="return salvanota2(<?=$x?>);">
                           <input type="hidden" name="usuario" value="<?=$_SESSION['usuario']?>">

                            <input type="number"  step="0.5" id="penalidade2" name="penalidade2" style="width: 72px; height: 40px"><br>

                            <select type="number"  id="manobra2" name="manobra2" style="height:40px; width: 72px;">
                                    <option value="1.5">+1 1/2</option>
                                    <option value="1">+1</option>
                                    <option value="0.5">+1/2</option>
                                    <option value="0" selected="">0</option>
                                    <option value="-0.5">-1/2</option>
                                    <option value="-1">-1</option>
                                    <option value="-1.5">-1 1/2</option>

                                </select><br>
                           <input type="submit" class="btn btn-primary"  style="width: 72px" id="salva2" value="Salvar">
                         </form>
                            </td>
                           <td>
              <!--  form3--> <form id="form3-<?=$x?>" onsubmit="return salvanota3(<?=$x?>);">
                            <input type="hidden" name="usuario" value="<?=$_SESSION['usuario']?>">

                            <input type="number"  step="0.5" id="penalidade3" name="penalidade3" style="width: 72px; height: 40px"><br>

                            <select type="number"  id="manobra3" name="manobra3" style="height:40px; width: 72px;">
                                    <option value="1.5">+1 1/2</option>
                                    <option value="1">+1</option>
                                    <option value="0.5">+1/2</option>
                                    <option value="0" selected="">0</option>
                                    <option value="-0.5">-1/2</option>
                                    <option value="-1">-1</option>
                                    <option value="-1.5">-1 1/2</option>

                                </select><br>
                           <input type="submit" class="btn btn-primary"  style="width: 72px" id="salva3" value="Salvar">
                         </form>
                            </td>
                           <td>
                <!--  form4 --><form id="form4-<?=$x?>" onsubmit="return salvanota4(<?=$x?>);">
                            <input type="hidden" name="usuario" value="<?=$_SESSION['usuario']?>">

                            <input type="number"  step="0.5" id="penalidade4" name="penalidade4" style="width: 72px; height: 40px"><br>

                            <select type="number"  id="manobra4" name="manobra4" style="height:40px; width: 72px;">
                                    <option value="1.5">+1 1/2</option>
                                    <option value="1">+1</option>
                                    <option value="0.5">+1/2</option>
                                    <option value="0" selected="">0</option>
                                    <option value="-0.5">-1/2</option>
                                    <option value="-1">-1</option>
                                    <option value="-1.5">-1 1/2</option>

                                </select><br>
                           <input type="submit" class="btn btn-primary"  style="width: 72px" id="salva4" value="Salvar">
                         </form>
                            </td>
                           <td>
              <!--  form5 --> <form id="form5-<?=$x?>" onsubmit="return salvanota5(<?=$x?>);">

                            <input type="hidden" name="usuario" value="<?=$_SESSION['usuario']?>">

                            <input type="number"  step="0.5" id="penalidade5" name="penalidade5" style="width: 72px; height: 40px"><br>

                            <select type="number"  id="manobra5" name="manobra5" style="height:40px; width: 72px;">
                                    <option value="1.5">+1 1/2</option>
                                    <option value="1">+1</option>
                                    <option value="0.5">+1/2</option>
                                    <option value="0" selected="">0</option>
                                    <option value="-0.5">-1/2</option>
                                    <option value="-1">-1</option>
                                    <option value="-1.5">-1 1/2</option>

                                </select><br>
                           <input type="submit" class="btn btn-primary" style="width: 72px" id="salva5" value="Salvar">
                         </form>
                            </td>
                           <td>
                <!--  form6 --><form id="form6-<?=$x?>" onsubmit="return salvanota6(<?=$x?>);">
                            <input type="hidden" name="usuario" value="<?=$_SESSION['usuario']?>">

                            <input type="number"  step="0.5" id="penalidade6" name="penalidade6" style="width: 72px; height: 40px"><br>

                            <select type="number"  id="manobra6" name="manobra6" style="height:40px; width: 72px;">
                                    <option value="1.5">+1 1/2</option>
                                    <option value="1">+1</option>
                                    <option value="0.5">+1/2</option>
                                    <option value="0" selected="">0</option>
                                    <option value="-0.5">-1/2</option>
                                    <option value="-1">-1</option>
                                    <option value="-1.5">-1 1/2</option>

                                </select><br>
                           <input type="submit" class="btn btn-primary"  style="width: 72px" id="salva6" value="Salvar">
                         </form>
                            </td>
                           <td>
              <!--  form7 --><form id="form7-<?=$x?>" onsubmit="return salvanota7(<?=$x?>);">
                            <input type="hidden" name="usuario" value="<?=$_SESSION['usuario']?>">
                            
                            <input type="number"  step="0.5" id="penalidade7" name="penalidade7" style="width: 72px; height: 40px; width: 73px;"><br>

                            <select type="number"  id="manobra7" name="manobra7" style="height:40px; width: 72px;">
                                    <option value="1.5">+1 1/2</option>
                                    <option value="1">+1</option>
                                    <option value="0.5">+1/2</option>
                                    <option value="0" selected="">0</option>
                                    <option value="-0.5">-1/2</option>
                                    <option value="-1">-1</option>
                                    <option value="-1.5">-1 1/2</option>

                                </select><br>
                           <input type="submit" class="btn btn-primary"  style="width: 72px" id="salva7" value="Salvar">
                         </form>
                            </td>
                          <td>
            <!--  form8 --><form id="form8-<?=$x?>" onsubmit="return salvanota8(<?=$x?>);">
                            <input type="hidden" name="usuario" value="<?=$_SESSION['usuario']?>">

                            <input type="number" step="0.5"  id="penalidade8" name="penalidade8" style="width: 72px; height: 40px"><br>

                            <select type="number" id="manobra8"  name="manobra8" style="height:40px; width:72px;">
                                    <option value="1.5">+1 1/2</option>
                                    <option value="1">+1</option>
                                    <option value="0.5">+1/2</option>
                                    <option value="0" selected="">0</option>
                                    <option value="-0.5">-1/2</option>
                                    <option value="-1">-1</option>
                                    <option value="-1.5">-1 1/2</option>

                                </select><br>
                           <input type="submit" class="btn btn-primary"  style="width: 72px" id="salva8" value="Salvar">
                         </form>
                            </td> 
                            
                        <td >
      <!--  form enviar --><form id="formoption1-<?=$x?>" onsubmit="return option1(<?=$x?>);">
                            <input type="hidden" name="usuario" value="<?=$_SESSION['usuario']?>">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="1" id="zerar-<?=$x?>" name="zerar">
                                <label class="form-check-label" for="zerar-<?=$x?>">Zerar</label>
                            </div><br>
                             
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input " value="1" id="revisao-<?=$x?>" name="revisao">
                              <label class="form-check-label"  for="revisao-<?=$x?>">Revisão</label>
                            </div>
                                             
                              <input type="submit" class="btn btn-primary" style="margin-top: 7px;"  id="enviaroption-<?=$x?>" value="Enviar" >
                          </form>
                         

                            </td> 
                                                  
                        </tr>
                      
  <!--  final do loop -->      <?php }}?>
                      </tbody>
                    </table>
              </div>
            </div>
            
          </div>
        </div>

        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer" style="width: 100%">
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
<!--  links js -->
    <script src="js/percursos.js"></script>
    <script src="js/salvanota1.js"></script>
    <script src="js/salvanota2.js"></script>
    <script src="js/salvanota3.js"></script>
    <script src="js/salvanota4.js"></script>
    <script src="js/salvanota5.js"></script>
    <script src="js/salvanota6.js"></script>
    <script src="js/salvanota7.js"></script>
    <script src="js/salvanota8.js"></script>
    <script src="js/option.js"></script>
  </body>
</html>