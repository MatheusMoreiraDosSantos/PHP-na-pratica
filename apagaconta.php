<?php
include('conexao.php');

$apagar = $_POST['apagar'];             //pega valor por pots
$usuarionome = $_POST['nomedousuario']; //pega valor por post
//verifica se o valor do pots 1 
if ($apagar == 1) {
	//query recupera o identificador do usuario atual
	$queryusuarioid=("select usuarioid from usuario where usuarionome = '$usuarionome';") 
  	or die(mysqli_error());

	$usuarioid = mysqli_query($conexao,$queryusuarioid); // executa a query

	$rowusuarioid = mysqli_fetch_array($usuarioid);		 //trata os dados

	// deleta a linha 
	$apagar = mysqli_query($conexao,"DELETE FROM usuario WHERE usuarioid = '$rowusuarioid[0]';");
 
	//direciona o usuario para a pagina de login
 	header('location: sair.php');
	exit();

}else{
	//direciona o usuario para a pagina de julgamento
	header('location: scorecard.php');
	exit();

}

?>