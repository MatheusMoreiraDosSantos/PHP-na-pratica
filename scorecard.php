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
    <meta name="author" content="">

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

      <a class="navbar-brand mr-1" href="scorecard.php">Sistema de Notas ao Vivo</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <h5 style="margin-left: 2%" class="text-white bg-dark"><?php echo 'Olá '. $_SESSION['usuario'];?></h5>
      

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Pesquisar..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Configurações</a>
            <a class="dropdown-item" href="#">Conta</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="scorecard.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Score Card</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="ordemdeentrada.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Ordem de entrada</span>
          </a>
        </li>
        
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Score Card
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                      <thead>
                        <tr>
                          

                          
                            <th scope="col">
                              <select  style="height:40px" onclick="percursos();" id="selectpercurso" >
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
                            
                          
                          


                          <th scope="col">Maneuver <br>description</th>
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
                          <th scope="col">Maneuver</th>
                          <th scope="col">1</th>
                          <th scope="col">2</th>
                          <th scope="col">3</th>
                          <th scope="col">4</th>
                          <th scope="col">5</th>
                          <th scope="col">6</th>
                          <th scope="col">7</th>
                          <th scope="col">8</th>
                          <th scope="col">TOTAL</th>

                        </tr>
                      </thead>
                      <tbody>
                        <!-- linha 1-->
                        <tr>
                          <td><h4>1</h4></td>
                          <td><h4>2</h4></td>
                         <td><strong>penalty<br>score</strong></td>
                           <td>
                            <input type="number" name="" style="width: 72px; height: 40px"><br>
                                <select id="n2" style="height:40px">
                                    <option>-1 1/2</option>
                                    <option>-1</option>
                                    <option>-1/2</option>
                                    <option selected="">0</option>
                                    <option>+1/2</option>
                                    <option>+1</option>
                                    <option>+1 1/2</option>

                                </select>
                            </td>
                           <td>
                            <input type="number" name="" style="width: 72px; height: 40px"><br>
                                <select style="height:40px">
                                    <option>-1 1/2</option>
                                    <option>-1</option>
                                    <option>-1/2</option>
                                   <option selected="">0</option>
                                    <option>+1/2</option>
                                    <option>+1</option>
                                    <option>+1 1/2</option>

                                </select>
                            </td>
                           <td>
                            <input type="number" name="" style="width: 72px; height: 40px"><br>
                                <select id="n3" style="height:40px">
                                    <option>-1 1/2</option>
                                    <option>-1</option>
                                    <option>-1/2</option>
                                    <option selected="">0</option>
                                    <option>+1/2</option>
                                    <option>+1</option>
                                    <option>+1 1/2</option>

                                </select>
                            </td>
                           <td>
                            <input type="number" name="" style="width: 72px; height: 40px"><br>
                                <select id="n4" style="height:40px">
                                    <option>-1 1/2</option>
                                    <option>-1</option>
                                    <option>-1/2</option>
                                    <option selected="">0</option>
                                    <option>+1/2</option>
                                    <option>+1</option>
                                    <option>+1 1/2</option>

                                </select>
                            </td>
                           <td>
                            <input type="number" name="" style="width: 72px; height: 40px"><br>
                                <select id="n5" style="height:40px">
                                    <option>-1 1/2</option>
                                    <option>-1</option>
                                    <option>-1/2</option>
                                    <option selected="">0</option>
                                    <option>+1/2</option>
                                    <option>+1</option>
                                    <option>+1 1/2</option>

                                </select>
                            </td>
                           <td>
                            <input type="number" name="" style="width: 72px; height: 40px"><br>
                                <select id="n6" style="height:40px">
                                    <option>-1 1/2</option>
                                    <option>-1</option>
                                    <option>-1/2</option>
                                    <option selected="">0</option>
                                    <option>+1/2</option>
                                    <option>+1</option>
                                    <option>+1 1/2</option>

                                </select>
                            </td>
                           <td>
                            <input type="number" name="" style="width: 72px; height: 40px"><br>
                                <select id="n7" style="height:40px">
                                    <option>-1 1/2</option>
                                    <option>-1</option>
                                    <option>-1/2</option>
                                    <option selected="">0</option>
                                    <option>+1/2</option>
                                    <option>+1</option>
                                    <option>+1 1/2</option>

                                </select>
                            </td>
                          <td>
                            <input type="number" name="" style="width: 72px; height: 40px"><br>
                                <select id="n8" style="height:40px">
                                    <option>-1 1/2</option>
                                    <option>-1</option>
                                    <option>-1/2</option>
                                    <option selected="">0</option>
                                    <option>+1/2</option>
                                    <option>+1</option>
                                    <option>+1 1/2</option>

                                </select>
                            </td> 
                            
                            <td id="total">
                                

                            </td>                         
                        </tr>
                      </tbody>
                    </table>
              </div>
            </div>
            
          </div>
        </div>

          

      
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
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

    <script src="js/percursos.js"></script>

  </body>

</html>
