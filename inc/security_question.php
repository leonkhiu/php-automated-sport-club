<?php
require_once ('database.php');


class SecurityQuestion extends DBO{

	protected static $tableName="security_question";
	protected static $tableFields=array('id', 'qeustion', 'answer');
	
	public $id;
	public $question;
	public $answer;	
	
	public static function randomOne(){
		global $mydb;
		$sql="SELECT * FROM `". self::$tableName. "` ORDER BY RAND() LIMIT 1";
		$found = $mydb->execute($sql);
		return array_shift($found);
	}
}
?>