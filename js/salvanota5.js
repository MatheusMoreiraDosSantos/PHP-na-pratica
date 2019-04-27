// ajax para pegar os valores da manobra e 
//enviar para o salvaphp sem que a pegina seja carregada
function salvanota5(linha){
	var form = $("#form5-" + linha).serialize();
		console.log(form);
		$.ajax({
			url: 'salvanota5.php',
			type:'POST',
			data:form,
			timeout:8000,
			
		}).done(function (data){
			console.log(data);
		});

	return false;
}