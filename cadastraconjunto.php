<?php
include('conexao.php');
$categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
$oe = mysqli_real_escape_string($conexao, $_POST['oe']);
$exh = mysqli_real_escape_string($conexao, $_POST['exh']);

$insert=mysqli_query($conexao,"insert into conjunto values (default,'$oe','$exh');");
                  
if ($insert) {
    echo '<div class="alert alert-danger" role="alert">
              SENHA OU USUÁRIO INCORRETOS!
            </div>'/*fazer alertar cadastro com sucesso*/;
}
                  
header('location: adm.php');
	exit();
?>