<?php
include('conexao.php');

$novasenha = $_POST['novasenha']; //pega valor por post
$senhaatual = $_POST['senha'];	  //pega valor por post

//query update senha em criptografia md5
$altersenha = mysqli_query($conexao,"update usuario set  usuariosenha= md5('$novasenha') where usuariosenha = md5('$senhaatual');");
//direciona o usuario para a pagina de julgamento
header('location: scorecard.php');
	exit();

?>