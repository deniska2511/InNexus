var activate = function()
{
	var email = $( "#email" ) . val();
	var pin = $( "#pin" ) . val();

	$.ajax({
		type: "POST",
		url: "http://" + location.hostname + "/core/actions/activate.php",
		data: { email: email, pin: pin },
		beforeSend: function(){

		},
		error: function(a){

		},
		success: function( a ){
			
			document.location.href = "http://" + location.hostname + "/@" + a;
			
		}
	}).done(function(){

	});
}