<<<<<<< HEAD
<h3>Добро пожаловать на страницу разрабатываемого проекта InNexus!</h3>
<p>На данной странице представлена наиболее подробная информация на текущее время о создании, структуре и работе проекта InNexus. Данный проект разрабатывается, как платформа, на которой можно обучаться программированию, делиться своими знаниями и опытом, создавать и разрабатывать свои проекты, показывать их всему миру, получать ценные советы и подсказки от других, более опытных в конкретной теме людей.</p>
<h2>Структура проекта</h2>
<p>Приступим к рассмотрению структуры проекта.</p>
<h4>Единая точка входа</h4>
<p>Приложение устроено таким образом, что вход в сайт всего лишь один - <b>index.php</b>, который располагается в самом корне сайта. Файл содержит код, который манипулирует подключением страниц в зависимости от запроса пользователя. Это значит, что для обращения к нужной нам странице (page), мы должны отправить запрос в виде GET-параметра, к его ячейке <b>page</b>.</p>
=======
<h3>����� ���������� �� �������� ���������������� ������� InNexus!</h3>
<p>�� ������ �������� ������������ �������� ��������� ���������� �� ������� ����� � ��������, ��������� � ������ ������� InNexus. ������ ������ ���������������, ��� ���������, �� ������� ����� ��������� ����������������, �������� ������ �������� � ������, ��������� � ������������� ���� �������, ���������� �� ����� ����, �������� ������ ������ � ��������� �� ������, ����� ������� � ���������� ���� �����.</p>
<h2>��������� �������</h2>
<p>��������� � ������������ ��������� �������.</p>
<h4>������ ����� �����</h4>
<p>���������� �������� ����� �������, ��� ���� � ���� ����� ���� ���� - <b>index.php</b>, ������� ������������� � ����� ����� �����. ���� �������� ���, ������� ������������ ������������ ������� � ����������� �� ������� ������������. ��� ������, ��� ��� ��������� � ������ ��� �������� (page), �� ������ ��������� ������ � ���� GET-���������, � ��� ������ <b>page</b>.</p>
>>>>>>> InNexus
<p><b>index.php</b></p>

```php

<<<<<<< HEAD
// запуск сессии
session_start();
// вывод всех ошибок
error_reporting( E_ALL );
// проверка наличия GET-параметра
=======
// ������ ������
session_start();
// ����� ���� ������
error_reporting( E_ALL );
// �������� ������� GET-���������
>>>>>>> InNexus
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
<<<<<<< HEAD
		$page -> getPage(); // Вывод страницы на экран
=======
		$page -> getPage(); // ����� �������� �� �����
>>>>>>> InNexus
	}
	else
	{

	}
}
else
{

}

```
<<<<<<< HEAD
<p>Следующая строка из кода выше</p>

```php
// проверка наличия GET-параметра
=======
<p>��������� ������ �� ���� ����</p>

```php
// �������� ������� GET-���������
>>>>>>> InNexus
if( empty( $_GET['page'] ) )
	header( "Location: /start" );
else
	$class = htmlspecialchars( strip_tags( stripslashes( trim( $_GET['page'] ) ) ) );

```

<<<<<<< HEAD
<p>указывает приложению, что в зависимости от GET['page'], подключается определенный класс страницы, на основе которого будет создан объект данной страницы, т.е. страница приложения - это и есть объект. Каждый класс страниц описывается по абстрактному классу <b>Main</b>, который подключается на следующей строке кода</p>
=======
<p>��������� ����������, ��� � ����������� �� GET['page'], ������������ ������������ ����� ��������, �� ������ �������� ����� ������ ������ ������ ��������, �.�. �������� ���������� - ��� � ���� ������. ������ ����� ������� ����������� �� ������������ ������ <b>Main</b>, ������� ������������ �� ��������� ������ ����</p>
>>>>>>> InNexus

```php
include "core/class/Main.php";
```

<<<<<<< HEAD
<p>Далее, создается переменная $file, которая содержит путь до файла страницы, содержащего класс, имя которого обязательно совпадает с именем файла.</p>
=======
<p>�����, ��������� ���������� $file, ������� �������� ���� �� ����� ��������, ����������� �����, ��� �������� ����������� ��������� � ������ �����.</p>
>>>>>>> InNexus

```php
$file = "core/class/" . $class . ".php";
```
<<<<<<< HEAD
<p>В зависимости от $class в переменную $file и записывается путь до файла.</p>

<p>Далее идет проверка на существование файла, и если файл существует, то он подключается. Таким вот образом и происходит подключение страниц, в зависимости от запроса пользователя.</p>
=======
<p>� ����������� �� $class � ���������� $file � ������������ ���� �� �����.</p>

<p>����� ���� �������� �� ������������� �����, � ���� ���� ����������, �� �� ������������. ����� ��� ������� � ���������� ����������� �������, � ����������� �� ������� ������������.</p>
>>>>>>> InNexus

```php
if( file_exists( $file ) )
{
	include $file;

```

<<<<<<< HEAD
<p>Затем, чтобы не было ошибок, проверяем наличие класса, имя которого совпадает с именем файла</p>
=======
<p>�����, ����� �� ���� ������, ��������� ������� ������, ��� �������� ��������� � ������ �����</p>
>>>>>>> InNexus

```php
if( class_exists( $class ) )
{
```

<<<<<<< HEAD
<p>и, если имеется такой класс, то мы создаем экземпляр класса, который описывается на основе абстрактного класса <b>Main</b>. И затем обращаемся к методу getPage(), для вывода страницы на экран.</p>

```php
$page = new $class;
$page -> getPage(); // Вывод страницы на экран
=======
<p>�, ���� ������� ����� �����, �� �� ������� ��������� ������, ������� ����������� �� ������ ������������ ������ <b>Main</b>. � ����� ���������� � ������ getPage(), ��� ������ �������� �� �����.</p>

```php
$page = new $class;
$page -> getPage(); // ����� �������� �� �����
>>>>>>> InNexus
```

<p><b>Main.php</b></p>
<p>core/class/Main.php</p>

```php
<?php




abstract class Main
{
	public $db, $config = [], $user, $title_page;
	public function __construct()
	{
<<<<<<< HEAD
		// подключение контроллеров
=======
		// ����������� ������������
>>>>>>> InNexus
		{
			include "core/controllers/redirect.php";
			include "core/controllers/DB.php";
			include "core/controllers/User.php";
		}
		

<<<<<<< HEAD
		// подключение файла конфигурации
		$_config = include "core/config/connect.php";

		// соединение с БД
		$this -> db = new DB( $_config['DB']['name'], $_config['DB']['user'], $_config['DB']['password'], $_config['DB']['host'], $_config['DB']['type'], $_config['DB']['charset'] );

		// создание пользователя
		// $this -> user = new User(); // рассмотрим позже

		// получение конфигураций сайта из БД
=======
		// ����������� ����� ������������
		$_config = include "core/config/connect.php";

		// ���������� � ��
		$this -> db = new DB( $_config['DB']['name'], $_config['DB']['user'], $_config['DB']['password'], $_config['DB']['host'], $_config['DB']['type'], $_config['DB']['charset'] );

		// �������� ������������
		// $this -> user = new User(); // ���������� �����

		// ��������� ������������ ����� �� ��
>>>>>>> InNexus
		{
			$query = $this -> db -> getRows( "SELECT * FROM `configs`" );
			for( $i = 0; $i < count( $query ); $i++ )
			{
				$title = $query[ $i ]['title'];
				$this -> config[ $title ] = $query[ $i ]['value'];
			}
		}

<<<<<<< HEAD
		// обработаем get параметры
=======
		// ���������� get ���������
>>>>>>> InNexus
		$get = [];
		$get['page'] = htmlspecialchars( strip_tags( stripslashes( trim( $_GET['page'] ) ) ) );
		for( $i = 2; $i <= 4; $i++ )
		{
			$get[ $i ] = ( !empty( $_GET['url' . $i ] ) ) ? htmlspecialchars( strip_tags( stripslashes( trim( $_GET['url' . $i] ) ) ) ) : "null";
		}
		

<<<<<<< HEAD
		// получение title страницы
=======
		// ��������� title ��������
>>>>>>> InNexus
		$query = $this -> db -> getRow( "SELECT `title` FROM `title_page` WHERE `url1` = ? and `url2` = ? and `url3` = ? and `url4` = ?", [ $get['page'], $get[2], $get[3], $get[4] ] );
		$this -> title_page = $query['title'];

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

	protected function module( $module )
	{
		if( file_exists( "app/tmpl/{$this -> config['SITE_TMPL']}/modules/{$module}.php" ) )
			include "app/tmpl/{$this -> config['SITE_TMPL']}/modules/{$module}.php";
		else
		{
<<<<<<< HEAD
			// выводим ошибку
=======
			// ������� ������
>>>>>>> InNexus
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
<<<<<<< HEAD
			// выводим ошибку
=======
			// ������� ������
>>>>>>> InNexus
		}
	}


	public function getPage()
	{
		include "app/tmpl/{$this -> config['SITE_TMPL']}/inc/header.php";
		$this -> body();
		include "app/tmpl/{$this -> config['SITE_TMPL']}/inc/footer.php";
	}
}
```

#hello