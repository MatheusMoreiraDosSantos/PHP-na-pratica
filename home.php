<!DOCTYPE html>

<html lang="pt-br">


  <head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ancr">

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
      


      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
        </div>
      </form>

      

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ordemdeentrada.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Ordem de entrada</span></a>
        </li>
        
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">
             <!-- Icon Cards-->          

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Notas</div>
            <div class="card-body">
              <div class="table-responsive">
                <?php 
                include('conexao.php');

                

                echo '<table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Juiz</th>
                      <th>Manobra</th>
                      <th>1</th>
                      <th>2</th>
                      <th>3</th>
                      <th>4</th>
                      <th>5</th>
                      <th>6</th>
                      <th>7</th>
                      <th>8</th>
                      <th>total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>juiz 1</td>
                      <td>Penalidade<br>Nota</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td><h3>70</h3></td>

                   </tr>
                    <tr>
                      <td>juiz 2</td>
                      <td>Penalidade<br>Nota</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td><h3>70</h3></td>

                   </tr>
                    <tr>
                      <td>juiz 3</td>
                      <td>Penalidade<br>Nota</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td><h3>70</h3></td>

                   </tr>
                    <tr>
                      <td>juiz 4</td>
                      <td>Penalidade<br>Nota</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td><h3>70</h3></td>

                   </tr>
                    <tr>
                      <td>juiz 5</td>
                      <td>Penalidade<br>Nota</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td>0<br>0</td>
                      <td><h3>70</h3></td>

                   </tr>
                    
                  </tbody>
                </table>'
                ?>
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
