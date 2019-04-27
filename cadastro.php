<?php
include ('conexao.php');
//pega valor por post
$nome=$_POST['nome'];
$email=$_POST['email'];
$numero=$_POST['numero'];
$senha=$_POST['senha'];
$confirmasenha=$_POST['confirmasenha'];

//query insert na tabela usuario
$conexao =mysqli_connect(host, usuario, senha, db);

$sql = mysqli_query($conexao,"insert into usuario(usuarionome,usuarioemail, usuarionumero,usuariosenha) values ('$nome','$email', $numero,md5('$senha'))");
header('location: index.php');
	exit();
?>