<h3>����� ���������� �� �������� ���������������� ������� InNexus!</h3>
<p>�� ������ �������� ������������ �������� ��������� ���������� �� ������� ����� � ��������, ��������� � ������ ������� InNexus. ������ ������ ���������������, ��� ���������, �� ������� ����� ��������� ����������������, �������� ������ �������� � ������, ��������� � ������������� ���� �������, ���������� �� ����� ����, �������� ������ ������ � ��������� �� ������, ����� ������� � ���������� ���� �����.</p>
<h2>��������� �������</h2>
<p>��������� � ������������ ��������� �������.</p>
<h4>������ ����� �����</h4>
<p>���������� �������� ����� �������, ��� ���� � ���� ����� ���� ���� - <b>index.php</b>, ������� ������������� � ����� ����� �����. ���� �������� ���, ������� ������������ ������������ ������� � ����������� �� ������� ������������. ��� ������, ��� ��� ��������� � ������ ��� �������� (page), �� ������ ��������� ������ � ���� GET-���������, � ��� ������ <b>page</b>.</p>
<p><b>index.php</b></p>

```php

// ������ ������
session_start();
// ����� ���� ������
error_reporting( E_ALL );
// �������� ������� GET-���������
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
		$page -> getPage(); // ����� �������� �� �����
	}
	else
	{

	}
}
else
{

}

```
<p>��������� ������ �� ���� ����</p>

```php
// �������� ������� GET-���������
if( empty( $_GET['page'] ) )
	header( "Location: /start" );
else
	$class = htmlspecialchars( strip_tags( stripslashes( trim( $_GET['page'] ) ) ) );

```

<p>��������� ����������, ��� � ����������� �� GET['page'], ������������ ������������ ����� ��������, �� ������ �������� ����� ������ ������ ������ ��������, �.�. �������� ���������� - ��� � ���� ������. ������ ����� ������� ����������� �� ������������ ������ <b>Main</b>, ������� ������������ �� ��������� ������ ����</p>

```php
include "core/class/Main.php";
```

<p>�����, ��������� ���������� $file, ������� �������� ���� �� ����� ��������, ����������� �����, ��� �������� ����������� ��������� � ������ �����.</p>

```php
$file = "core/class/" . $class . ".php";
```
<p>� ����������� �� $class � ���������� $file � ������������ ���� �� �����.</p>

<p>����� ���� �������� �� ������������� �����, � ���� ���� ����������, �� �� ������������. ����� ��� ������� � ���������� ����������� �������, � ����������� �� ������� ������������.</p>

```php
if( file_exists( $file ) )
{
	include $file;

```

<p>�����, ����� �� ���� ������, ��������� ������� ������, ��� �������� ��������� � ������ �����</p>

```php
if( class_exists( $class ) )
{
```

<p>�, ���� ������� ����� �����, �� �� ������� ��������� ������, ������� ����������� �� ������ ������������ ������ <b>Main</b>. � ����� ���������� � ������ getPage(), ��� ������ �������� �� �����.</p>

```php
$page = new $class;
$page -> getPage(); // ����� �������� �� �����
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
		// ����������� ������������
		{
			include "core/controllers/redirect.php";
			include "core/controllers/DB.php";
			include "core/controllers/User.php";
		}
		

		// ����������� ����� ������������
		$_config = include "core/config/connect.php";

		// ���������� � ��
		$this -> db = new DB( $_config['DB']['name'], $_config['DB']['user'], $_config['DB']['password'], $_config['DB']['host'], $_config['DB']['type'], $_config['DB']['charset'] );

		// �������� ������������
		// $this -> user = new User(); // ���������� �����

		// ��������� ������������ ����� �� ��
		{
			$query = $this -> db -> getRows( "SELECT * FROM `configs`" );
			for( $i = 0; $i < count( $query ); $i++ )
			{
				$title = $query[ $i ]['title'];
				$this -> config[ $title ] = $query[ $i ]['value'];
			}
		}

		// ���������� get ���������
		$get = [];
		$get['page'] = htmlspecialchars( strip_tags( stripslashes( trim( $_GET['page'] ) ) ) );
		for( $i = 2; $i <= 4; $i++ )
		{
			$get[ $i ] = ( !empty( $_GET['url' . $i ] ) ) ? htmlspecialchars( strip_tags( stripslashes( trim( $_GET['url' . $i] ) ) ) ) : "null";
		}
		

		// ��������� title ��������
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
			// ������� ������
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
			// ������� ������
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

