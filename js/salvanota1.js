// ajax para pegar os valores da manobra e 
//enviar para o salvaphp sem que a pegina seja carregada
function salvanota1(linha){
	var form = $("#form1-" + linha).serialize();
		console.log(form);
		$.ajax({
			url: 'salvanota1.php',
			type:'POST',
			data:form,
			timeout:8000,
			
		}).done(function (data){
			console.log(data);
		});

	return false;
}

