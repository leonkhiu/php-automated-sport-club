<?php
require_once ('database.php');


/**
 * This is not an actual table, It is a view table to make the operation on system log easier
 * @author moho
 *
 */
class SysLog extends DBO{

	protected static $tableName="syslog";
	protected static $tableFields=array('username', 'message', 'date');
	
	public $username;
	public $message;
	public $date;	
	
	//FIXME fix this one as SQL injection
	public static function findAllPagination2($perPage, $offset, $DESC=false){
		global $mydb;
	
		$className=get_called_class();
		$object= new $className;
		$sql = "SELECT * FROM ". $object::$tableName;
		$sql.=" LIMIT {$perPage} OFFSET {$offset}";
		if($DESC){
			$sql.=" ORDER BY `date` DESC";
		}
		return $mydb->execute($sql);
	}
}
?>