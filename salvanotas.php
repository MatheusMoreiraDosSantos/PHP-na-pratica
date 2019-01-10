<?php

include('conexao.php');

$manobra1 = $_POST['manobra1'];

     $insert=mysqli_query($conexao,"insert into notas values (default,'$manobra1',default,default,default,default,default,default,default,default,default,default,default,default,default,default,default);") or die(mysql_error());  

?>