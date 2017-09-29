<?php
session_start();

if( !empty( $_POST['login'] ) and !empty( $_POST['password'] ) )
{
	$login = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['login'] ) ) ) );
	$password = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['password'] ) ) ) );

	include "../controllers/DB.php";
	$_config = include "../config/connect.php";

	$db = new DB( $_config['DB']['name'], $_config['DB']['user'], $_config['DB']['password'], $_config['DB']['host'], $_config['DB']['type'], $_config['DB']['charset'] );

	$query = $db -> getRow( "SELECT `password` FROM `users` WHERE `login` = ?", [ $login ] );

	if( $query['password'] == $password )
	{
		$query = $db -> getRow( "SELECT `id` FROM `users` WHERE `login` = ? and `password` = ?", [ $login, $password ] );

		$_SESSION['id'] = $query['id'];
		$success = "201"; // Авторизация успешна
		echo json_encode(array( $success, $login));
	}
}
else
{

}