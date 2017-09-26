<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<title><?=$this -> config['SITE_NAME'] . " - " . $this -> title_page?></title>
	<?=$this -> js( [ 'jquery', 'main' ] )?>
	<?=$this -> css( [ 'main', 'menu' ] )?>
	<?=$this -> font( [ 'Roboto', 'Ubuntu', 'Open+Sans', 'Open+Sans+Condensed:300' ] )?>
</head>
<body>