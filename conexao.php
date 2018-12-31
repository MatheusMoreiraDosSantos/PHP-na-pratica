<?php

define('host', 'localhost');
define('usuario', 'root');
define('senha', '');
define('db', 'sistemanotas');

$conexao =mysqli_connect(host, usuario, senha, db) or die('Não foi possovel conectar');


?>