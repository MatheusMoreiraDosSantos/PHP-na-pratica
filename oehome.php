<!DOCTYPE html>
<html lang="pt-br">
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

      <!-- Sidebar  menu a esquerda da pagina-->
      <ul class="sidebar navbar-nav toggled">
        <li class="nav-item ">
          <a class="nav-link" href="home.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Home</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="oehome.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Ordem de entrada</span>
          </a>
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
                        //se select prova estiver alterado
                      if (isset($_POST['provaid'])) {
                        
                      
                      $prova=$_POST['provaid'];                   
                      $query =("select draw, exh, conjunto.conjuntoid, cavaleiro, proprietario,
                                animal, nivel1, nivel2, nivel3, nivel4, cidade 
                                from conjunto left outer join prova 
                                on conjunto.provaid=prova.provaid     
                                where conjunto.provaid='$prova';")

                      or die(mysql_error());
                      $result = mysqli_query($conexao,$query);                    
                     
                  ?>
                   <div class="table-responsive">
                <table class="table table-striped">

                  
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
                          <th scope="col">Nota</th>
                          

                        </tr>
                      </thead>
                      <tbody>
                        <!-- linha 1--><?php
                    //com loop - show dados
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
                              <h5> 
             <!-- show total das notas - (maior nota + manor nota) -->
                                <?php
                                $conjuntoid = $dados['conjuntoid'];
                                $querynotas = "select notas.total from notas 
                                               left outer join juiznota on notas.notasid=juiznota.notasid
                                               left outer join conjunto on conjunto.conjuntoid=juiznota.conjuntoid
                                  where conjunto.conjuntoid = $conjuntoid ;"
                                                    or die(mysql_error());
                                $resultadonotas = mysqli_query($conexao,$querynotas);
                                $total = array();
                                $con = 0;

                                while ($dadostotal = mysqli_fetch_assoc($resultadonotas)) {
                               
                                    $total[$con] = $dadostotal['total'];
                                    $con++;
                                    
                                }

                                // echo "<pre>";
                                // print_r($total);
                                // echo "</pre>";

                                $somatoria = 0;

                                if(count($total)){
                                  $max = max($total);
                                  $min = min($total);

                                  foreach ($total as $key => $value) {
                                    $somatoria += $value;
                                  }

                                    $somatoria = $somatoria - ( $max + $min );
                                }
                                  echo $somatoria;
                                ?>
                                
                              </h5>
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