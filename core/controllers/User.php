<?php



class User
{
  protected $db;
  protected $dateReg;
  protected $dateAuth;
  public    $count;
  public function post( $post )
  {
    return htmlspecialchars( strip_tags( stripslashes( trim( $_POST[ $post ] ) ) ) );
  }
  protected function get( $get )
  {
    return htmlspecialchars( strip_tags( stripslashes( trim( $_GET[ $get ] ) ) ) );
  }
  public $id, $login, $password, $email, $name, $surname, $birthday, $birthmonth, $birthyear, $city, $avatar, $isActive, $tarif, $status, $level;
  public function __construct()
  {
    if( file_exists( "core/controllers/DB.php" ) )
      include_once "core/controllers/DB.php";
    elseif( file_exists( "../controllers/DB.php" ) )
      include_once "../controllers/DB.php";
    if( file_exists( "core/config/default.php" ) )
      $_config = include "core/config/default.php";
    elseif( file_exists( "../config/default.php" ) )
      $_config = include "../config/default.php";
    $this -> db = new DB( $_config['DB']['name'], $_config['DB']['user'], $_config['DB']['password'], $_config['DB']['host'], $_config['DB']['type'], $_config['DB']['charset'] );
    $this -> id();
    
    $row = $this -> db -> getRows( "SELECT `id` FROM `users`" );
    $this -> count = count( $row );
    
    $this -> login = $this -> login();
    $this -> password = $this -> password();
    $this -> email = $this -> email();
    $this -> name = $this -> name();
    $this -> surname = $this -> surname();
    $this -> birthday = $this -> birthday();
    $this -> birthmonth = $this -> birthmonth();
    $this -> birthyear = $this -> birthyear();
    $this -> city = $this -> city();
    $this -> avatar = $this -> avatar();
    $this -> isActive = $this -> isActive();
    $this -> tarif = $this -> tarif();
    $this -> status = $this -> status();
    $this -> level = $this -> level();
  }
  
  protected function id()
  {
    if( !empty( $_GET['login'] ) )
    {
      $row = $this -> db -> getRow( "SELECT `id` FROM `users` WHERE `login` = ?", [ $this ->  get( 'login' ) ] );
      return $this -> id = $row['id'];
    }
    elseif( !empty( $_SESSION['id'] ) )
    {
      $row = $this -> db -> getRow( "SELECT `id` FROM `users` WHERE `id` = ?", [ $_SESSION['id'] ] );
      $this -> id = $row['id'];
    }
  }
  
  protected function login()
  {
    $row = $this -> db -> getRow( "SELECT `login` FROM `users` WHERE `id` = ?", [ $this ->  id ] );
    return $this -> login = $row['login'];
  }
  
  protected function password()
  {
    $row = $this -> db -> getRow( "SELECT `password` FROM `users` WHERE `id` = ?", [ $this ->  id ] );
    return $this -> password = $row['password'];
  }
  
  protected function email()
  {
    $row = $this -> db -> getRow( "SELECT `email` FROM `users` WHERE `id` = ?", [ $this ->  id ] );
    return $this -> email = $row['email'];
  }
  
  protected function name()
  {
    $row = $this -> db -> getRow( "SELECT `username` FROM `users` WHERE `id` = ?", [ $this ->  id ] );
    return $this -> name = $row['username'];
  }
  
  protected function surname()
  {
    $row = $this -> db -> getRow( "SELECT `usersurname` FROM `users` WHERE `id` = ?", [ $this ->  id ] );
    return $this -> surname = $row['usersurname'];
  }
  
  protected function birthday()
  {
    $row = $this -> db -> getRow( "SELECT `birthday` FROM `users` WHERE `id` = ?", [ $this ->  id ] );
    return $this -> birthday = $row['birthday'];
  }
  
  protected function birthmonth()
  {
    $row = $this -> db -> getRow( "SELECT `birthmonth` FROM `users` WHERE `id` = ?", [ $this ->  id ] );
    return $this -> birthmonth = $row['birthmonth'];
  }
  
  protected function birthyear()
  {
    $row = $this -> db -> getRow( "SELECT `birthyear` FROM `users` WHERE `id` = ?", [ $this ->  id ] );
    return $this -> birthyear = $row['birthyear'];
  }
  
  protected function city()
  {
    $row = $this -> db -> getRow( "SELECT `city` FROM `users` WHERE `id` = ?", [ $this ->  id ] );
    return $this -> city = $row['city'];
  }
  
  protected function avatar()
  {
    $row = $this -> db -> getRow( "SELECT `avatar` FROM `users` WHERE `id` = ?", [ $this ->  id ] );
    return $this -> avatar = $row['avatar'];
  }
  
  protected function isActive()
  {
    $row = $this -> db -> getRow( "SELECT `isActive` FROM `users` WHERE `id` = ?", [ $this ->  id ] );
    return $this -> isActive = $row['isActive'];
  }
  
  protected function tarif()
  {
    $row = $this -> db -> getRow( "SELECT `tarif` FROM `users` WHERE `id` = ?", [ $this ->  id ] );
    return $this -> tarif = $row['tarif'];
  }
  
  protected function status()
  {
    $row = $this -> db -> getRow( "SELECT `status` FROM `users` WHERE `id` = ?", [ $this ->  id ] );
    return $this -> status = $row['status'];
  }
  
  protected function level()
  {
    $row = $this -> db -> getRow( "SELECT `level` FROM `users` WHERE `id` = ?", [ $this ->  id ] );
    return $this -> level = $row['level'];
  }
  
  public function login_regist()
  {
    $row = $this -> db -> getRow( "SELECT `login` FROM `users` WHERE `id` = ?", [ $_SESSION['id'] ] );
    return $row['login'];
  }
  
  public function listing()
  {
    $row = $this -> db -> getRows( "SELECT * FROM `users`" );
    return $row;
  }
  
  public function lessons_progress( $a )
  {
    
    
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
}