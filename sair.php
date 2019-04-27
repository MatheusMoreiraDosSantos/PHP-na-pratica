<?php
session_start(); //inicio da sessao
session_destroy(); // destroi a sessao atual
header('location: index.php'); //direciona o usuario para a pagina de login
exit();
?>