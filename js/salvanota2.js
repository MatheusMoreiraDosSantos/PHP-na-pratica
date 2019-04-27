// ajax para pegar os valores da manobra e 
//enviar para o salvaphp sem que a pegina seja carregada
function salvanota2(linha){
	var form = $("#form2-" + linha).serialize();
		console.log(form);
		$.ajax({
			url: 'salvanota2.php',
			type:'POST',
			data:form,
			timeout:8000,
			
		}).done(function (data){
			console.log(data);
		});

	return false;
}