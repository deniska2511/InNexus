<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<title><?=$this -> config['SITE_NAME'] . " - " . $this -> title_page?></title>
	<?=$this -> js( [ 'jquery', 'main' ] )?>
	<?php
	if( $this -> class_page() == 'sign_up' ) echo $this -> js( [ 'sign_up' ] );
	if( $this -> class_page() == 'activate' ) echo $this -> js( [ 'activate_pin' ] );
	if( $this -> class_page() == 'sign_in' ) echo $this -> js( [ 'sign_in' ] );
	?>

	<?=$this -> css( [ 'main' ] )?>
	<?=$this -> font( [ 'Roboto', 'Ubuntu', 'Open+Sans', 'Wendy+One' ] )?>
</head>
<body>