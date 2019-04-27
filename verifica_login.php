<?php
session_start(); //inicia sessao

//se o usuario nao estiver logado o  direciona para a pagina de login
if (!$_SESSION['usuario']) {
	header('location: index.php');
	exit();
}
?>