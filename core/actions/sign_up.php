<?php
session_start();

if( !empty( $_POST['name'] ) and !empty( $_POST['login'] ) and !empty( $_POST['password'] ) and !empty( $_POST['email'] ) )
{
	$name = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['name'] ) ) ) );
	$login = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['login'] ) ) ) );
	$password = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['password'] ) ) ) );
	$email = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['email'] ) ) ) );

	if( $_POST['step'] == 2 )
	{
		$_SESSION['name-r'] = $name;
		$_SESSION['login-r'] = $login;
		$_SESSION['password-r'] = $password;
		$_SESSION['email-r'] = $email;

		echo $_SESSION['step-reg'] = 'tarif_plane';
	}
}
?>