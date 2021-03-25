jQuery(document).ready(function(){
	jQuery('#login-form-anjo').submit(function(){
		var dados = jQuery( this ).serialize();
		jQuery.ajax({
			type: "POST",
			url: "../scripts_g/PHP/login_anjo.php",
			data: dados,
			beforeSend: function() {

			},
			success: function(data)
			{
				if(data == 'LOGADO'){
				   window.location.href = "chat.php?myid=&idother=&room=&where=";
				}else{
					alert(data);

				}
			},

		});
		$("#login-form-anjo").trigger("reset");
		return false;
		});
});
