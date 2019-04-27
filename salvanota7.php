<?php

include('conexao.php');


  var_dump($_POST);
 $manobra7 = $_POST['manobra7'];   // dados por post
 $fmanobra7= floatval($manobra7);  //converte em float

 $penalidade7 = $_POST['penalidade7'];  // dados por post
 $fpenalidade7 = floatval($penalidade7);  //converte em float

 $juiznome = $_POST['usuario'];   // dados por post

 //query ultima linha que o usuario inseriu 
 $querymaxidnota=("select max(notasid) from notas WHERE juiznome = '$juiznome';")
  or die(mysqli_error($conexao)); 
  
  $maxnotaid = mysqli_query($conexao,$querymaxidnota);  //executa a query

  $rowmaxnotaid = mysqli_fetch_array($maxnotaid);   //trata dados


//update table notas na ultima linha que o usuario inseriu 
$update=mysqli_query($conexao,"UPDATE notas 
SET 
    manobra7 = $fmanobra7,
    penalidade7 = $fpenalidade7
WHERE
     notasid = '$rowmaxnotaid[0]';") 
  or die(mysqli_error($conexao));  


?>