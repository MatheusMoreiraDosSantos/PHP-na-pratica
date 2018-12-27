<?php
include('conexao.php');
$categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
$oe = mysqli_real_escape_string($conexao, $_POST['oe']);
$exh = mysqli_real_escape_string($conexao, $_POST['exh']);
$prova = mysqli_real_escape_string($conexao, $_POST['prova']);

$insert=mysqli_query($conexao,"insert into conjunto values (default,'$oe','$exh','$prova');") or die(mysql_error());

	header('location: adm.php');
	exit();


?>