<?php
require_once ('database.php');


class User extends DBO{

	protected static $tableName="user";
	protected static $tableFields=array('id', 'username', 'active', 'hashpassword', 'fname', 'lname', 'date');
	
	public $id;
	public $username;
	public $active;
	public $hashpassword;
	public $fname;
	public $lname;
	public $date;
	
	
	/*
	 * I have used the better and OO version in dbo object
	public static function create($data = array()){
		global $mydb;
		$sql = "INSERT INTO ". self::$tableName ." (`username`, `active`, `hashpassword`, `fname`, `lname`, `date`) VALUES (?, ?, ?, ?, ?, ?)";
		return ($mydb->execute($sql, $data)) ? true : false;
	}
	*/

	public static function findUser($username){
		global $mydb;
		$sql="SELECT * FROM ". self::$tableName. " WHERE (`username` = ?) LIMIT 1";
		$parameter = array($username);
		return $mydb->execute($sql, $parameter);
	}
	
	public static function findUsernameById($id){
		global $mydb;
		$sql="SELECT `username` FROM ". self::$tableName. " WHERE (`id` = ?) LIMIT 1";
		$parameter = array($id);
		$result = $mydb->execute($sql, $parameter);
		$result = array_shift($result);
		return $result->username;
	}

	//TODO: rewrite this
	Public static function updateByID($id, $data = array()){
		global $mydb;
		$sql = "UPDATE `users` SET `username`=?,`email`=? WHERE `ID` = ?";
		array_push($data, $id);
		return ($mydb->execute($sql, $data)) ? true: false;
	}
	
	public static function authentication($username="", $password=""){
		global $mydb;
		$sql="SELECT * FROM ".self::$tableName." WHERE (`username`=?) AND (`hashpassword`=?) LIMIT 1";
		
		$parameter = array($username, $password);
		$found = $mydb->execute($sql, $parameter);
		return !empty($found)? array_shift($found) : false;
		
	}

} // end of : class User
$user=new User();

?>