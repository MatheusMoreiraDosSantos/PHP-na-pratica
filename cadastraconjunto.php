<?php
include('conexao.php');

//pega valores por post
$categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
$oe = mysqli_real_escape_string($conexao, $_POST['oe']);
$exh = mysqli_real_escape_string($conexao, $_POST['exh']);
$prova = mysqli_real_escape_string($conexao, $_POST['prova']);
$cavaleiro = mysqli_real_escape_string($conexao, $_POST['cavaleiro']);
$animal = mysqli_real_escape_string($conexao, $_POST['animal']);
$proprietario = mysqli_real_escape_string($conexao, $_POST['proprietario']);
$nivel1 = mysqli_real_escape_string($conexao, $_POST['nivel1']);
$nivel2 = mysqli_real_escape_string($conexao, $_POST['nivel2']);
$nivel3 = mysqli_real_escape_string($conexao, $_POST['nivel3']);
$nivel4 = mysqli_real_escape_string($conexao, $_POST['nivel4']);
$cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);

//query insere valores no banco de dados na tabela conjuntos
$insert=mysqli_query($conexao,"insert into conjunto values (default,'$oe','$exh','$prova','$cavaleiro','$proprietario','$animal','$cidade','$nivel1','$nivel2','$nivel3','$nivel4');") or die(mysql_error());
//direciona o usuario para a pagina de cadastro de conjuntos
	header('location: adm.php');
	exit();


?>