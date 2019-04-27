<?php

include('conexao.php');

$postconjuntoid = $_POST['conjuntoid']; //dados por post
$intconjuntoid  =  (int)$postconjuntoid; //dados por post
 

  var_dump($_POST);
 $manobra1 = $_POST['manobra1'];
 $fmanobra1 = floatval($manobra1); //coverte em float

 $penalidade1 = $_POST['penalidade1'];
 $fpenalidade1 = floatval($penalidade1); //converte em float

 $juiznome = $_POST['usuario']; //dado por post

 
//query insert na table notas
  $insert=mysqli_query($conexao,"insert into notas values 
  (default,'$fmanobra1',default,default,default,default,default,default,default,'$fpenalidade1',default,default,default,default,default,default,default, '$juiznome',default);") 
  or die(mysqli_error($conexao));  

//query ultima linha inseria na tabela notas
  $querymaxidnota=("select max(notasid) from notas;")
  or die(mysqli_error($conexao)); 

//id do usuario atual
  $queryusuarioid=("select usuarioid from usuario where usuarionome = '$juiznome';") 
  or die(mysqli_error($conexao));

  $usuarioid = mysqli_query($conexao,$queryusuarioid); //executa a query
  $maxnotaid = mysqli_query($conexao,$querymaxidnota); //executa a query

  $rowusuarioid = mysqli_fetch_array($usuarioid); //trata dados
  $rowmaxnotaid = mysqli_fetch_array($maxnotaid); //trata dados
  



$setf= mysqli_query($conexao,"set FOREIGN_KEY_CHECKS = 0;")  
or die(mysqli_error());//desabilita sistema de checagem do banco de dados, para executar a query

//insere na tabela juiznotas as chaves estrangeiras
  $insert=mysqli_query($conexao," insert into juiznota (juiznotaid, notasid,usuarioid,conjuntoid) values 
  (default,'$rowmaxnotaid[0]','$rowusuarioid[0]','$intconjuntoid');") 
  or die(mysqli_error($conexao));
 
 $set=mysqli_query($conexao,"set FOREIGN_KEY_CHECKS =1;") 
  or die(mysqli_error()); // habilita a checagem apos o insert 


?>