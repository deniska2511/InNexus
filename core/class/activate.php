<?php



class activate extends Main
{
	public function email()
	{
		$query = $this -> db -> getRow( "SELECT `email` FROM `users` WHERE `login` = ?", [ $_GET['url2'] ] );
		return $query['email'];
	}
	protected function body()
	{
		$this -> module( 'top-container' );
		$this -> page();
	}
}