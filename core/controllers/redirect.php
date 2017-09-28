<?php

if( $_GET['page'] == 'sign_up' )
{
	// все редиректы на странице регистрации
	if( empty( $_GET['url2'] ) )
	{
		header( "Location: /sign_up/create_profile" );
	}
}