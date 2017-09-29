<?php



class profile extends Main
{
	public function profile_page()
	{
		$query = $this -> db -> getRow( "SELECT * FROM `profile_page` WHERE `id_user` = ?", [ $this -> user -> id ] );
		return $query;
	}

	protected function body()
	{
		$this -> module( 'top-container' );
		$this -> page();
	}
}