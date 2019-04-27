<?php

include('conexao.php');


  var_dump($_POST);
 $manobra4 = $_POST['manobra4'];  // dados por post
 $fmanobra4= floatval($manobra4);   //converte em float

 $penalidade4 = $_POST['penalidade4'];   // dados por post
 $fpenalidade4 = floatval($penalidade4);  //converte em float
 $juiznome = $_POST['usuario'];   // dados por post

//query ultima linha que o usuario inseriu 
$querymaxidnota=("select max(notasid) from notas WHERE juiznome = '$juiznome';")
  or die(mysqli_error($conexao)); 
  
  $maxnotaid = mysqli_query($conexao,$querymaxidnota);  //executa a query
  
  $rowmaxnotaid = mysqli_fetch_array($maxnotaid); //trata dados

//update table notas na ultima linha que o usuario inseriu 
$update=mysqli_query($conexao,"UPDATE notas 
SET 
    manobra4 = $fmanobra4,
    penalidade4 = $fpenalidade4
WHERE
     notasid = '$rowmaxnotaid[0]';") 
  or die(mysqli_error($conexao));  


?>