<?php
require_once ('database.php');


class SystemLog extends DBO{

	protected static $tableName="system_log";
	protected static $tableFields=array('uid', 'msg', 'date');
	
	public $uid;
	public $msg;
	public $date;	
			
	public static function removeAll(){
		global $mydb;
		$sql="TRUNCATE TABLE ". self::$tableName;
		$result = $mydb->execute($sql);
	}
	
}
?>