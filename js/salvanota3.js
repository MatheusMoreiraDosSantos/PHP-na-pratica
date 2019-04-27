// ajax para pegar os valores da manobra e 
//enviar para o salvaphp sem que a pegina seja carregada
function salvanota3(linha){
	var form = $("#form3-" + linha).serialize();
		console.log(form);
		$.ajax({
			url: 'salvanota3.php',
			type:'POST',
			data:form,
			timeout:8000,
			
		}).done(function (data){
			console.log(data);
		});

	return false;
}