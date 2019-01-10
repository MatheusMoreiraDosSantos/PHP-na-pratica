$(document).ready(function () {
	$("#salva").click(function () {
		var form = new FormData($("#form")[0]);
		$.ajax({
			url: 'salvanotas.php',
			type:'post',
			dataType:'json',
			cache:false,
			processData:false,
			contentType:false,
			data:form,
			timeout:8000,
			seccess:function (resultado) {
				
			}
		});
	})
})