
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
		};
		if( a == 3 ){
			var tarif = $( ".tarif-input" ) . val();
			var send_desc = $( "#send-to-email-desc" ) . val();
			var edit = $( "#tarif-edit" ) . val();

			$.ajax({
				type: "POST",
				url: "http://" + location.hostname + "/core/actions/sign_up.php",
				data: { tarif: tarif, send_desc: send_desc, edit: edit, step: a },
				beforeSend: function(){

				},
				error: function(){

				},
				success: function(){
					document.location.href = "http://" + location.hostname + "/sign_up/dop";
				}
			}).done(function(){

			});

			
		};

		if( a == 'regist' ){
			var city = $( "#city" ) . val();
			var day = $( "#day" ) . val();
			var month = $( "#month" ) . val();
			var year = $( "#year" ) . val();
			var expir = $( "#expir" ) . val();
			var purpose = $( "#purpose" ) . val();

			$.ajax({
				type: "POST",
				url: "http://" + location.hostname + "/core/actions/sign_up.php",
				data: { city: city, day: day, month: month, year: year, expir: expir, purpose: purpose, step: a },
				beforeSend: function(){
					alert( expir )
				},
				error: function(){

				},
				success: function( a ){
					document.location.href = "http://" + location.hostname + "/activate/@" + a;
				}
			}).done(function(){

			});

			
		}

}