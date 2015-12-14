$().ready(function(){
		$.ajax({
			url: base_url+"index.php/welcome/ajax",
			method:"POST",
			data:{ name: "luisplata" },
			context: document.body
			}).done(function(dato) {
				$("#datos").html(dato);
		});
	});