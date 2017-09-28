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
		include "../controllers/DB.php";
		$_config = include "../config/connect.php";
		$db = new DB( $_config['DB']['name'], $_config['DB']['user'], $_config['DB']['password'], $_config['DB']['host'], $_config['DB']['type'], $_config['DB']['charset'] );

		$row = $db -> getRow( "SELECT `id` FROM `users` WHERE `email` = ?", [ $email ] );
		$query = $db -> getRow( "SELECT `id` FROM `users` WHERE `login` = ?", [ $login ] );

		if( !empty( $row['id'] ) and !empty( $query['id'] ) )
		{
			echo "102";
			exit();
		}

		if( empty( $row['id'] ) )
		{
			if( empty( $query['id'] ) )
			{
				$_SESSION['name-r'] = $name;
				$_SESSION['login-r'] = $login;
				$_SESSION['password-r'] = $password;
				$_SESSION['email-r'] = $email;

				echo $_SESSION['step-reg'] = 'tarif_plane';

			}
			else
			{
				// если данный логин уже есть в базе
				echo "100"; // код ошибки "Логин зарегистрирован"
				exit();
			}
		}
		else
		{
			// если данный email уже зарегистрирован
			echo "101"; // код ошибки "email зарегистрирован"
			exit();
		}
	}
}
elseif( $_POST['step'] == 3 )
{
	$tarif = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['tarif'] ) ) ) );
	$send_desc = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['send_desc'] ) ) ) );
	$edit = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['edit'] ) ) ) );

	$_SESSION['tarif-r'] = $tarif;
	$_SESSION['send_desc-r'] = $send_desc;
	$_SESSION['edit-tarif-r'] = $edit;

	echo $_SESSION['step-reg'] = 'dop';
}

elseif( $_POST['step'] == 'regist' )
{
	$city = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['city'] ) ) ) );
	$day = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['day'] ) ) ) );
	$month = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['month'] ) ) ) );
	$year = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['year'] ) ) ) );
	$expir = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['expir'] ) ) ) );
	$purpose = htmlspecialchars( strip_tags( stripslashes( trim( $_POST['purpose'] ) ) ) );

	if( !empty( $city ) and !empty( $day ) and !empty( $month ) and !empty( $year ) and !empty( $expir ) and !empty( $purpose ) )
	{

		include "../controllers/DB.php";
		$_config = include "../config/connect.php";
		include "../controllers/User.php";

		if( $db = new DB( $_config['DB']['name'], $_config['DB']['user'], $_config['DB']['password'], $_config['DB']['host'], $_config['DB']['type'], $_config['DB']['charset'] ) )
		{
			$query = $db -> getRow( "SELECT `id` FROM `users` WHERE `login` = ?", [ $_SESSION['login-r'] ] );

			if( empty( $query['id'] ) )
			{
				$row = $db -> getRow( "SELECT `id` FROM `users` WHERE `email` = ?", [ $_SESSION['email-r'] ] );
				if( empty( $row['id'] ) )
				{
					include "../controllers/generate_str.php";
					$pin = generateStr( 12 ); // строка из 12 символов

					$query = $db -> insertRow( "INSERT INTO `users` (`login`, `email`, `password`, `username`, `city`, `birthday`, `birthmonth`, `birthyear`, `tarif`, `expir`,`purpose`) VALUES (?,?,?,?,?,?,?,?,?,?,?)", [ $_SESSION['login-r'], $_SESSION['email-r'], $_SESSION['password-r'], $_SESSION['name-r'], $city, $day, $month, $year, $_SESSION['tarif-r'], $expir, $purpose ] );
					$insert_pin = $db -> insertRow( "INSERT INTO `user-activate-cod` (`user_email`, `pin`) VALUES (?,?)", [ $_SESSION['email-r'], $pin ] );
					if( $query )
					{
						// понадобится подключение библиотеки PHPMailer для отправка Pin на email
						require "../../libs/PHPMailer/class.phpmailer.php";
						require "../../libs/PHPMailer/class.smtp.php";

						// работа с формированием письма
						$body_mail = "<h1>Спасибо за регистрацию на сайте InNexus!</h1><p>Ваш PIN: {$pin}</p>";

						$mail = new PHPMailer();
						$mail -> SMTPAuth = true;
						$mail -> Username = "innexus.site@gmail.com";
						$mail -> Password = "123456";

						$mail -> CharSet = "UTF-8";
						$mail -> IsHTML( true );
						$mail -> SetFrom( "innexus.site@gmail.com", "Администратор InNexus" );
						$mail -> Subject = "Регистрация нового пользователя";
						$mail -> MsgHTML( $body_mail );
						$mail -> AddAddress( $_SESSION['email-r'] );

						if( $mail -> Send() )
						{
							$query = $db -> getRow( "SELECT `id`, `login` FROM `users` WHERE `email` = ? and `login` = ? and `password` = ?", [ $_SESSION['email-r'], $_SESSION['login-r'], $_SESSION['password-r'] ] );
							$_SESSION['id'] = $query['id'];
							echo $query['login'];
						}
						else {

						}

					}
					else
					{

					}
					
				}
				else {
					// если такой email уже есть отловим ошибку
				}
			}
			else {
				// если такой login уже есть отловим ошибку
			}
		}
		else {

		}

	}
}
?>