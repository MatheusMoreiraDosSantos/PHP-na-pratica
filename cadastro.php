<?php
include ('conexao.php');
$nome=$_POST['nome'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$confirmasenha=$_POST['confirmasenha'];

$conexao =mysqli_connect(host, usuario, senha, db);
$sql = mysqli_query($conexao,"insert into usuario(usuarionome,usuarioemail,usuariosenha) values ('$nome','$email',md5('$senha'))");
header('location: index.php');
	exit();



?>