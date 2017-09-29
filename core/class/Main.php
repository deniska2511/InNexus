<?php




abstract class Main
{
	public $db, $config = [], $user, $title_page;
	public function __construct()
	{
		// подключение контроллеров
		{
			include "core/controllers/redirect.php";
			include "core/controllers/DB.php";
			include "core/controllers/User.php";
		}
		

		// подключение файла конфигурации
		$_config = include "core/config/connect.php";

		// соединение с БД
		$this -> db = new DB( $_config['DB']['name'], $_config['DB']['user'], $_config['DB']['password'], $_config['DB']['host'], $_config['DB']['type'], $_config['DB']['charset'] );

		// создание пользователя
		$this -> user = new User(); 

		// получение конфигураций сайта из БД
		{
			$query = $this -> db -> getRows( "SELECT * FROM `configs`" );
			for( $i = 0; $i < count( $query ); $i++ )
			{
				$title = $query[ $i ]['title'];
				$this -> config[ $title ] = $query[ $i ]['value'];
			}
		}

		// обработаем get параметры
		$get = [];
		$get['page'] = htmlspecialchars( strip_tags( stripslashes( trim( $_GET['page'] ) ) ) );
		for( $i = 2; $i <= 4; $i++ )
		{
			$get[ $i ] = ( !empty( $_GET['url' . $i ] ) ) ? htmlspecialchars( strip_tags( stripslashes( trim( $_GET['url' . $i] ) ) ) ) : "null";
		}
		

		// получение title страницы

		if( $get['page'] == 'profile' )
		{
			$this -> title_page = $this -> user -> name;
		}
		else
		{
			$query = $this -> db -> getRow( "SELECT `title` FROM `title_page` WHERE `url1` = ? and `url2` = ? and `url3` = ? and `url4` = ?", [ $get['page'], $get[2], $get[3], $get[4] ] );
			$this -> title_page = $query['title'];
		}

	}

	public function css( array $css )
	{
		foreach( $css as $f )
		{
			echo "<link rel = 'stylesheet' href = '{$this -> config['SITE_URL']}app/tmpl/{$this -> config['SITE_TMPL']}/css/{$f}.css'>\n\t";
		}
	}

	public function js( array $js )
	{
		foreach( $js as $f )
		{
			echo ( strtolower( $f ) == 'jquery' ) ? "<script src='//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>\n\t" : "<script src = '{$this -> config['SITE_URL']}app/tmpl/{$this -> config['SITE_TMPL']}/js/{$f}.js'></script>\n\t";
		}
	}

	public function font( array $font )
	{
		foreach( $font as $f )
		{
			echo "<link href='https://fonts.googleapis.com/css?family={$f}' rel='stylesheet'>\n\t";
		}
	}

	abstract protected function body();

	public function module( $module )
	{
		if( file_exists( "app/tmpl/{$this -> config['SITE_TMPL']}/modules/{$module}.php" ) )
			include "app/tmpl/{$this -> config['SITE_TMPL']}/modules/{$module}.php";
		else
		{
			// выводим ошибку
		}
	}

	protected function class_page()
	{
		return htmlspecialchars( strip_tags( stripslashes( trim( $_GET['page'] ) ) ) );
	}

	protected function page()
	{
		if( file_exists( "app/tmpl/{$this -> config['SITE_TMPL']}/pages/{$this -> class_page()}.php" ) )
			include "app/tmpl/{$this -> config['SITE_TMPL']}/pages/{$this -> class_page()}.php";
		else
		{
			// выводим ошибку
		}
	}


	public function getPage()
	{
		include "app/tmpl/{$this -> config['SITE_TMPL']}/inc/header.php";
		$this -> body();
		include "app/tmpl/{$this -> config['SITE_TMPL']}/inc/footer.php";
	}
}