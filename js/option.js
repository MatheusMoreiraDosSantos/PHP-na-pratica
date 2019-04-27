
// esta funcao verifica se a opcao 'zerar' esta marcada
function option1(linha){
	var form = $("#formoption1-" + linha).serialize();
		console.log(form);
		$.ajax({
			url: 'totalizar.php',
			type:'POST',
			data:form,
			timeout:8000,
			
		}).done(function (data){
			console.log(data);
		});

	return false;
}