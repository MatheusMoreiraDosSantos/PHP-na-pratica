<?php

include('conexao.php');


  var_dump($_POST);
 $manobra2 = $_POST['manobra2'];     // dados por post
 $fmanobra2 = floatval($manobra2);   //converte em float

$penalidade2 = $_POST['penalidade2'];     // dados por post
$fpenalidade2 = floatval($penalidade2);   //converte em float
$juiznome = $_POST['usuario'];


//query ultima linha que o usuario inseriu 
  $querymaxidnota=("select max(notasid) from notas WHERE juiznome = '$juiznome';")
  or die(mysqli_error($conexao)); 
  
  $maxnotaid = mysqli_query($conexao,$querymaxidnota); //executa a query
  
  $rowmaxnotaid = mysqli_fetch_array($maxnotaid); //trata dados


//update table notas na ultima linha que o usuario inseriu 
$update=mysqli_query($conexao,"UPDATE notas 
SET 
    manobra2 = $fmanobra2,
    penalidade2 = $fpenalidade2
WHERE
     notasid = '$rowmaxnotaid[0]';") 
  or die(mysqli_error($conexao));  


?>