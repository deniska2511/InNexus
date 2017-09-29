var sign_in = function()
{
	var login = $( "#login" ) . val();
	var password = $( "#password" ) . val();

	$.ajax({
		type: "POST",
		url: "http://" + location.hostname + "/core/actions/sign_in.php",
		data: { login: login, password: password },
		dataType: "json",
		beforeSend: function(){

		},
		error: function(a){

		},
		success: function( a ){
			if( String( a[0] ) == '201' )
			{
				document.location.href = "http://" + location.hostname + "/@" + a[1];
			}
			
			
		}
	}).done(function(){

	});
}