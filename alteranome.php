<?php
include('conexao.php');

$novonome = $_POST['novonome']; //pega valor por post
$nomeatual = $_POST['nome'];    //pega valor pos pots

//query update nome
$alteranome = mysqli_query($conexao,"update usuario set  usuarionome= '$novonome' where usuarionome ='$nomeatual';");

//direciona o usuario para a pagina de julgamento
header('location: scorecard.php');
	exit();

?>