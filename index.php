<?php
// запуск сессии
session_start();
// вывод всех ошибок
error_reporting( E_ALL );
// проверка наличия GET-параметра
if( empty( $_GET['page'] ) )
	header( "Location: /start" );
else
	$class = htmlspecialchars( strip_tags( stripslashes( trim( $_GET['page'] ) ) ) );

include "core/class/Main.php";

$file = "core/class/" . $class . ".php";

if( file_exists( $file ) )
{
	include $file;

	if( class_exists( $class ) )
	{
		$page = new $class;
		$page -> getPage(); // Вывод страницы на экран
	}
	else
	{

	}
}
else
{

}

//

