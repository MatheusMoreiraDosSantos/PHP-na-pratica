<?php

include('conexao.php');


  var_dump($_POST);
 $manobra3 = $_POST['manobra3']; // dados por post
 $fmanobra3= floatval($manobra3); //converte em float


 $penalidade3 = $_POST['penalidade3'];  // dados por post
 $fpenalidade3 = floatval($penalidade3); //converte em float

 $juiznome = $_POST['usuario']; // dados por post
 
 //query ultima linha que o usuario inseriu 
$querymaxidnota=("select max(notasid) from notas WHERE juiznome = '$juiznome';")
  or die(mysqli_error($conexao)); 
  
  $maxnotaid = mysqli_query($conexao,$querymaxidnota);  //executa a query
  
  $rowmaxnotaid = mysqli_fetch_array($maxnotaid);   //trata dados

//update table notas na ultima linha que o usuario inseriu 
$update=mysqli_query($conexao,"UPDATE notas 
SET 
    manobra3 = $fmanobra3,
    penalidade3 = $fpenalidade3
WHERE
     notasid = '$rowmaxnotaid[0]';") 
  or die(mysqli_error($conexao));  


?>