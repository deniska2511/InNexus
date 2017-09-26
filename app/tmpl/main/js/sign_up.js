
	var toNextStepReg = function( a ){
		// в зависимости от параметра перенаправаляем пользователя на следующий шаг регистрации
		if( a == 2 ){
			var name = $( "#user-name" ) . val();
			var login = $( "#login" ) . val();
			var email = $( "#email" ) . val();
			var password = $( "#password" ) . val();

			$.ajax({
				type: "POST",
				url: "http://" + location.hostname + "/core/actions/sign_up.php",
				data: { name: name, login: login, email: email, password: password, step: a },
				beforeSend: function(){

				},
				error: function(){

				},
				success: function(){
					document.location.href = "http://" + location.hostname + "/sign_up/tarif_plane";
				}
			}).done(function(){

			});
		}
	}