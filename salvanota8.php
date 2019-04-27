<?php

include('conexao.php');


  var_dump($_POST); 
 $manobra8 = $_POST['manobra8'];  // dados por post
 $fmanobra8= floatval($manobra8);  //converte em float

 $penalidade8 = $_POST['penalidade8'];  // dados por post
 $fpenalidade8 = floatval($penalidade8); //converte em float

 $juiznome = $_POST['usuario'];  // dados por post


//query ultima linha que o usuario inseriu 
$querymaxidnota=("select max(notasid) from notas WHERE juiznome = '$juiznome';")
  or die(mysqli_error($conexao)); 
  
  $maxnotaid = mysqli_query($conexao,$querymaxidnota);  //executa a query
  
  $rowmaxnotaid = mysqli_fetch_array($maxnotaid);  //trata dados

//update table notas na ultima linha que o usuario inseriu 
$update=mysqli_query($conexao,"UPDATE notas 
SET 
    manobra8 = $fmanobra8,
    penalidade8 = $fpenalidade8
WHERE
     notasid = '$rowmaxnotaid[0]';") 
  or die(mysqli_error($conexao));  


?>