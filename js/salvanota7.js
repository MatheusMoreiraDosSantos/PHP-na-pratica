// ajax para pegar os valores da manobra e 
//enviar para o salvaphp sem que a pegina seja carregada
function salvanota7(linha){
	var form = $("#form7-" + linha).serialize();
		console.log(form);
		$.ajax({
			url: 'salvanota7.php',
			type:'POST',
			data:form,
			timeout:8000,
			
		}).done(function (data){
			console.log(data);
		});

	return false;
}