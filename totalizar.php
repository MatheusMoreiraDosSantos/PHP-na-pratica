<?php

include('conexao.php');


 $juiznome = $_POST['usuario']; //dados por post

//verifica se zerar esta checado
if (isset($_POST['zerar'])) {
	
  //query ultima linha que o usuario inseriu 
  	$querymaxidnota=("select max(notasid) from notas WHERE juiznome = '$juiznome';")
  		or die(mysqli_error($conexao)); 
  
  		$maxnotaid = mysqli_query($conexao,$querymaxidnota); //executa a query
  
  		$rowmaxnotaid = mysqli_fetch_array($maxnotaid);  //trata dados


//update table notas na ultima linha que o usuario inseriu - total = 0
		$update=mysqli_query($conexao,"UPDATE notas 
			SET 
    			total='0'
			WHERE
     			notasid = '$rowmaxnotaid[0]';") 
  		or die(mysqli_error($conexao));  
  }
  else {
    //query todas as ultimas notas que o usuario inseriu
  	$allnotas ="select juiznome, notasid, manobra1,manobra2, manobra3, manobra4, manobra5,manobra6, manobra7, manobra8, penalidade1, penalidade2, penalidade3, penalidade4, penalidade5, penalidade6, penalidade7, penalidade8 from notas where juiznome = '$juiznome'  order by notasid desc limit 1;" or die(mysqli_error($conexao));

	$querynotas = mysqli_query($conexao, $allnotas); //executa a query
	$notas = mysqli_fetch_assoc($querynotas);     //trata dados da query


//soma todas as notas +70
	$total = 70 + $notas['manobra1']+$notas['manobra2']+$notas['manobra3']+$notas['manobra4']+$notas['manobra5']+$notas['manobra6']+$notas['manobra7']+$notas['manobra8']+$notas['penalidade1']+$notas['penalidade2']+$notas['penalidade3']+$notas['penalidade4']+$notas['penalidade5']+$notas['penalidade6']+$notas['penalidade7']+$notas['penalidade8'];

//query ultima linha que o usuario inseriu 
		$querymaxidnota=("select max(notasid) from notas WHERE juiznome = '$juiznome';")
  		or die(mysqli_error($conexao)); 
  
  		$maxnotaid = mysqli_query($conexao,$querymaxidnota);  //executa a query
  
  		$rowmaxnotaid = mysqli_fetch_array($maxnotaid); //trata dados da query


//update table notas na ultima linha que o usuario inseriu 
		$update=mysqli_query($conexao,"UPDATE notas 
			SET 
    			total='$total'
			WHERE
     			notasid = '$rowmaxnotaid[0]';") 
  		or die(mysqli_error($conexao));  
  }



?>