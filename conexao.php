<?php
//arquivo de conexao
define('host', 'localhost');
define('usuario', 'root');
define('senha', '');
define('db', 'sistemanotas');

$conexao =mysqli_connect(host, usuario, senha, db) or die('Não foi possivel conectar');


?>