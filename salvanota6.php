<?php

include('conexao.php');


  var_dump($_POST);
 $manobra6 = $_POST['manobra6'];   // dados por post
 $fmanobra6= floatval($manobra6);  //converte em float

 $penalidade6 = $_POST['penalidade6'];  // dados por post
 $fpenalidade6 = floatval($penalidade6);  //converte em float
 $juiznome = $_POST['usuario'];         // dados por post
 

 //query ultima linha que o usuario inseriu 
 $querymaxidnota=("select max(notasid) from notas WHERE juiznome = '$juiznome';")
  or die(mysqli_error($conexao)); 
  
  $maxnotaid = mysqli_query($conexao,$querymaxidnota);   //executa a query
  
  $rowmaxnotaid = mysqli_fetch_array($maxnotaid);  //trata dados

//update table notas na ultima linha que o usuario inseriu 
$update=mysqli_query($conexao,"UPDATE notas 
SET 
    manobra6 = $fmanobra6,
    penalidade6 = $fpenalidade6
WHERE
     notasid = '$rowmaxnotaid[0]';") 
  or die(mysqli_error($conexao));  


?>