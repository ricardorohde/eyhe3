jQuery(document).ready(function(){
	jQuery('#login-form').submit(function(){
		var dados = jQuery( this ).serialize();
		jQuery.ajax({
			type: "POST",
			url: "scripts_g/PHP/login.php",
			data: dados,
			beforeSend: function() {
			   
			},
			success: function(data)
			{
				if(data == 'LOGADO'){                           
				   window.location.href = "dashboard.php";                                                       
				}else{
					alert(data);
				   
				}
			},
			
		});
		$("#login-form").trigger("reset");
		return false;
		});
});