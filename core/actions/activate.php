<?php
session_start();

if( !empty( $_POST['email'] ) and !empty( $_POST['pin'] ) )
{
	$pin = htmlspecialchars( stripcslashes( strip_tags( trim( $_POST['pin'] ) ) ) );
	$email = htmlspecialchars( stripcslashes( strip_tags( trim( $_POST['email'] ) ) ) );

	include "../controllers/DB.php";
	$_config = include "../config/connect.php";
	$db = new DB( $_config['DB']['name'], $_config['DB']['user'], $_config['DB']['password'], $_config['DB']['host'], $_config['DB']['type'], $_config['DB']['charset'] );


	$query = $db -> getRow( "SELECT `pin` FROM `user-activate-cod` WHERE `user_email` = ?", [ $email ] );

	if( !empty( $query['pin'] ) )
	{
		if( $query['pin'] == $pin )
		{
			$db -> updateRow( "UPDATE `users` SET `isActive` = '1'" );
			
			$row = $db -> getRow( "SELECT `id`, `login` FROM `users` WHERE `email` = ?", [ $email ] );
			$_SESSION['id'] = $row['id'];

			$login = $row['login'];

			echo $login;
		}
		else
		{

		}
	}
	else
	{

	}
}
else
{

}

?>