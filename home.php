<!DOCTYPE html>

<html lang="pt-br">


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
      


      <!-- Navbar Search nao utilizado nesta versao do sistema-->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
        </div>
      </form>
    </nav>

    <div id="wrapper">

      <!-- Sidebar links a esquerda da pagina-->
      <ul class="sidebar navbar-nav toggled">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="oehome.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Ordem de entrada</span></a>
        </li>
        
        
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">
             <!-- Icon Cards-->          

          <!-- DataTables Example -->

          <?php
          include_once('conexao.php');
                header("Refresh: 1; url = home.php");
          ?>
          <div class="card mb-3">
            <strong><h4><div class="card-header" >

<!-- php responsavel por mostrar o cavaleiro e animal -->
              <?php 
                    $querymaxidjuiznota=("select max(juiznotaid) from juiznota;")
                    or die(mysqli_error());
                    $maxjuiznotaid = mysqli_query($conexao,$querymaxidjuiznota);
                    $rowmaxjuiznotaid = mysqli_fetch_array($maxjuiznotaid); 

                    $queryconjunto =  ("select conjuntoid from juiznota where juiznotaid = $rowmaxjuiznotaid[0];")or die(mysql_error());
                    $resultconjunto = mysqli_query($conexao,$queryconjunto); 
                    $qconjunto = mysqli_fetch_array($resultconjunto);
                    
                    
                    $querydadosconjunto ="select  cavaleiro, animal from conjunto where conjuntoid = $qconjunto[0];";
                    $resultdadosconjunto = mysqli_query($conexao,$querydadosconjunto);
                    $qdadosconjunto = mysqli_fetch_array($resultdadosconjunto);
              ?>
              <i class="fas fa-table"></i>
              Notas   <?php echo "  de  ".$qdadosconjunto['cavaleiro']."   com   ".$qdadosconjunto['animal'] ?>
            </div></h4>
            </strong>
<!-- inicio do corpo da table -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
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
                  <tbody  style="font-weight: bold">
<!-- query responsavel por trazer as notas do juiz 1 -->
                    <tr>
                      <?php 
                
                $selectnotas1=mysqli_query($conexao, "select juiznome, notas.notasid, manobra1,manobra2,
                manobra3, manobra4, manobra5, manobra6, manobra7, manobra8, penalidade1, penalidade2,
                penalidade3, penalidade4, penalidade5, penalidade6, penalidade7, penalidade8 from notas 
                inner join juiznota on notas.notasid=juiznota.notasid 
                inner join usuario on usuario.usuarioid=juiznota.usuarioid where usuarionumero = 1 order by notasid desc limit 1;") or die(mysqli_error());
                
                $notas1 = mysqli_fetch_assoc($selectnotas1);

                ?>
                <!-- show dados -->
                     
                  <td><?php echo $notas1['juiznome']?></td>
                  <td>Penalidade<br>Nota</td>
                  <td><h4><?php echo $notas1['penalidade1']?><br><?php echo $notas1['manobra1']?></h4></td>
                  <td><h4><?php echo $notas1['penalidade2']?><br><?php echo $notas1['manobra2']?></h4></td>
                  <td><h4><?php echo $notas1['penalidade3']?><br><?php echo $notas1['manobra3']?></h4></td>
                  <td><h4><?php echo $notas1['penalidade4']?><br><?php echo $notas1['manobra4']?></h4></td>
                  <td><h4><?php echo $notas1['penalidade5']?><br><?php echo $notas1['manobra5']?></h4></td>
                  <td><h4><?php echo $notas1['penalidade6']?><br><?php echo $notas1['manobra6']?></h4></td>
                  <td><h4><?php echo $notas1['penalidade7']?><br><?php echo $notas1['manobra7']?></h4></td>
                  <td><h4><?php echo $notas1['penalidade8']?><br><?php echo $notas1['manobra8']?></h4></td>
                        
                      <td><h2>
<!-- soma notas + 70-->
                        <?php 

                          $total1 = 70 +$notas1['manobra1']+$notas1['manobra2']+$notas1['manobra3']+$notas1['manobra4']+$notas1['manobra5']+$notas1['manobra6']+$notas1['manobra7']+$notas1['manobra8']+$notas1['penalidade1']+$notas1['penalidade2']+$notas1['penalidade3']+$notas1['penalidade4']+$notas1['penalidade5']+$notas1['penalidade6']+$notas1['penalidade7']+$notas1['penalidade8'];
                          echo $total1;


                      ?>
                        

                      </h2>
                    </td>

                   </tr>
                    <tr>
<!-- query responsavel por trazer as notas do juiz 2 -->
                      <?php 
                
                $selectnotas2=mysqli_query($conexao, "select juiznome, notas.notasid, manobra1,manobra2,
                manobra3, manobra4, manobra5, manobra6, manobra7, manobra8, penalidade1, penalidade2,
                penalidade3, penalidade4, penalidade5, penalidade6, penalidade7, penalidade8 from notas 
                inner join juiznota on notas.notasid=juiznota.notasid 
                inner join usuario on usuario.usuarioid=juiznota.usuarioid where usuarionumero = 2 order by notasid desc limit 1;") or die(mysql_error());
                
                $notas2 = mysqli_fetch_assoc($selectnotas2);

                ?>
                <!-- show dados -->
                <td><?php echo $notas2['juiznome']?></td>
                <td>Penalidade<br>Nota</td>
                <td><h4><?php echo $notas2['penalidade1']?><br><?php echo $notas2['manobra1']?></h4></td>
                <td><h4><?php echo $notas2['penalidade2']?><br><?php echo $notas2['manobra2']?></h4></td>
                <td><h4><?php echo $notas2['penalidade3']?><br><?php echo $notas2['manobra3']?></h4></td>
                <td><h4><?php echo $notas2['penalidade4']?><br><?php echo $notas2['manobra4']?></h4></td>
                <td><h4><?php echo $notas2['penalidade5']?><br><?php echo $notas2['manobra5']?></h4></td>
                <td><h4><?php echo $notas2['penalidade6']?><br><?php echo $notas2['manobra6']?></h4></td>
                <td><h4><?php echo $notas2['penalidade7']?><br><?php echo $notas2['manobra7']?></h4></td>
                <td><h4><?php echo $notas2['penalidade8']?><br><?php echo $notas2['manobra8']?></h4></td>
                      <td><h2>
<!-- soma notas  + 70 -->
                        <?php 

                          $total2 = 70 +$notas2['manobra1']+$notas2['manobra2']+$notas2['manobra3']+$notas2['manobra4']+$notas2['manobra5']+$notas2['manobra6']+$notas2['manobra7']+$notas2['manobra8']+$notas2['penalidade1']+$notas2['penalidade2']+$notas2['penalidade3']+$notas2['penalidade4']+$notas2['penalidade5']+$notas2['penalidade6']+$notas2['penalidade7']+$notas2['penalidade8'];
                          echo $total2;


                      ?>
                    </h2>
                  </td>

                   </tr>
                    <tr>
<!-- query responsavel por trazer as notas do juiz 3 -->
                      <?php 
                
                $selectnotas3=mysqli_query($conexao, "select juiznome, notas.notasid, manobra1,manobra2,
                manobra3, manobra4, manobra5, manobra6, manobra7, manobra8, penalidade1, penalidade2,
                penalidade3, penalidade4, penalidade5, penalidade6, penalidade7, penalidade8 from notas 
                inner join juiznota on notas.notasid=juiznota.notasid 
                inner join usuario on usuario.usuarioid=juiznota.usuarioid where usuarionumero = 3 order by notasid desc limit 1;") or die(mysql_error());
                
                $notas3 = mysqli_fetch_assoc($selectnotas3);

                ?>
<!-- show dados -->
                      <td><?php echo $notas3['juiznome']?></td>
                      <td>Penalidade<br>Nota</td>
                      <td><h4><?php echo $notas3['penalidade1']?><br><?php echo $notas3['manobra1']?></h4></td>
                      <td><h4><?php echo $notas3['penalidade2']?><br><?php echo $notas3['manobra2']?></h4></td>
                      <td><h4><?php echo $notas3['penalidade3']?><br><?php echo $notas3['manobra3']?></h4></td>
                      <td><h4><?php echo $notas3['penalidade4']?><br><?php echo $notas3['manobra4']?></h4></td>
                      <td><h4><?php echo $notas3['penalidade5']?><br><?php echo $notas3['manobra5']?></h4></td>
                      <td><h4><?php echo $notas3['penalidade6']?><br><?php echo $notas3['manobra6']?></h4></td>
                      <td><h4><?php echo $notas3['penalidade7']?><br><?php echo $notas3['manobra7']?></h4></td>
                      <td><h4><?php echo $notas3['penalidade8']?><br><?php echo $notas3['manobra8']?></h4></td>
                      <td><h2>
<!-- soma notas +70 -->
                        <?php 

                          $total3 = 70 +$notas3['manobra1']+$notas3['manobra2']+$notas3['manobra3']+$notas3['manobra4']+$notas3['manobra5']+$notas3['manobra6']+$notas3['manobra7']+$notas3['manobra8']+$notas3['penalidade1']+$notas3['penalidade2']+$notas3['penalidade3']+$notas3['penalidade4']+$notas3['penalidade5']+$notas3['penalidade6']+$notas3['penalidade7']+$notas3['penalidade8'];
                          echo $total3;


                      ?>
                    </h2>
                  </td>

                   </tr>
                    <tr>
<!-- query responsavel por trazer as notas do juiz 4 -->
                      <?php 
                
                $selectnotas4=mysqli_query($conexao, "select juiznome, notas.notasid, manobra1,manobra2,
                manobra3, manobra4, manobra5, manobra6, manobra7, manobra8, penalidade1, penalidade2,
                penalidade3, penalidade4, penalidade5, penalidade6, penalidade7, penalidade8 from notas 
                inner join juiznota on notas.notasid=juiznota.notasid 
                inner join usuario on usuario.usuarioid=juiznota.usuarioid where usuarionumero = 4 order by notasid desc limit 1;") or die(mysql_error());
                
                $notas4 = mysqli_fetch_assoc($selectnotas4);

                ?>
<!-- show notas -->
                      <td><?php echo $notas4['juiznome']?></td>
                      <td>Penalidade<br>Nota</td>
                      <td><h4><?php echo $notas4['penalidade1']?><br><?php echo $notas4['manobra1']?></h4></td>
                      <td><h4><?php echo $notas4['penalidade2']?><br><?php echo $notas4['manobra2']?></h4></td>
                      <td><h4><?php echo $notas4['penalidade3']?><br><?php echo $notas4['manobra3']?></h4></td>
                      <td><h4><?php echo $notas4['penalidade4']?><br><?php echo $notas4['manobra4']?></h4></td>
                      <td><h4><?php echo $notas4['penalidade5']?><br><?php echo $notas4['manobra5']?></h4></td>
                      <td><h4><?php echo $notas4['penalidade6']?><br><?php echo $notas4['manobra6']?></h4></td>
                      <td><h4><?php echo $notas4['penalidade7']?><br><?php echo $notas4['manobra7']?></h4></td>
                      <td><h4><?php echo $notas4['penalidade8']?><br><?php echo $notas4['manobra8']?></h4></td>
                      <td><h2>
<!-- soma notas +70-->
                        <?php 

                          $total4 = 70 +$notas4['manobra1']+$notas4['manobra2']+$notas4['manobra3']+$notas4['manobra4']+$notas4['manobra5']+$notas4['manobra6']+$notas4['manobra7']+$notas4['manobra8']+$notas4['penalidade1']+$notas4['penalidade2']+$notas4['penalidade3']+$notas4['penalidade4']+$notas4['penalidade5']+$notas4['penalidade6']+$notas4['penalidade7']+$notas4['penalidade8'];
                          echo $total4;


                       ?>
                      </h2>
                    </td>
                  </tr>
<!-- query responsavel por trazer as notas do juiz 5 -->
                            <?php 
                
                $selectnotas5=mysqli_query($conexao, "select juiznome, notas.notasid, manobra1,manobra2,
                manobra3, manobra4, manobra5, manobra6, manobra7, manobra8, penalidade1, penalidade2,
                penalidade3, penalidade4, penalidade5, penalidade6, penalidade7, penalidade8 from notas 
                inner join juiznota on notas.notasid=juiznota.notasid 
                inner join usuario on usuario.usuarioid=juiznota.usuarioid where usuarionumero = 5 order by notasid desc limit 1;") or die(mysql_error());
                
                $notas5 = mysqli_fetch_assoc($selectnotas5);

                ?>
<!-- show notas -->
                      <td><?php echo $notas5['juiznome']?></td>
                      <td>Penalidade<br>Nota</td>
                      <td><h4><?php echo $notas5['penalidade1']?><br><?php echo $notas5['manobra1']?></h4></td>
                      <td><h4><?php echo $notas5['penalidade2']?><br><?php echo $notas5['manobra2']?></h4></td>
                      <td><h4><?php echo $notas5['penalidade3']?><br><?php echo $notas5['manobra3']?></h4></td>
                      <td><h4><?php echo $notas5['penalidade4']?><br><?php echo $notas5['manobra4']?></h4></td>
                      <td><h4><?php echo $notas5['penalidade5']?><br><?php echo $notas5['manobra5']?></h4></td>
                      <td><h4><?php echo $notas5['penalidade6']?><br><?php echo $notas5['manobra6']?></h4></td>
                      <td><h4><?php echo $notas5['penalidade7']?><br><?php echo $notas5['manobra7']?></h4></td>
                      <td><h4><?php echo $notas5['penalidade8']?><br><?php echo $notas5['manobra8']?></h4></td>
                      <td><h3>
<!-- show notas -->
                        <?php 

                          $total5 = 70 + $notas5['manobra1']+$notas5['manobra2']+$notas5['manobra3']+$notas5['manobra4']+$notas5['manobra5']+$notas5['manobra6']+$notas5['manobra7']+$notas5['manobra8']+$notas5['penalidade1']+$notas5['penalidade2']+$notas5['penalidade3']+$notas5['penalidade4']+$notas5['penalidade5']+$notas5['penalidade6']+$notas5['penalidade7']+$notas5['penalidade8'];
                          
                          echo $total5;
                         
         /* maior nota */ $maior = (max($total1,$total2, $total3, $total4, $total5)); 
         /* menor nota */ $menor = (min($total1,$total2, $total3, $total4, $total5)); 

           $somatoria = ($total1 + $total2 + $total3 + $total4 + $total5) - ($menor+$maior) ;

                      ?>

                   </tr>
                    
                  </tbody>

                </table>
                <!-- show total das notas ex: 215.5 -->
              <center><h1> <?php echo "Total =  $somatoria ";  ?> </h1></center>
              </div>
            </div>
            
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer>
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
