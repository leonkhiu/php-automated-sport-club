<?php
require_once ('database.php');
class AjaxChecker extends DBO {
	protected static $tableName = "ajax_checker";
	protected static $tableFields = array (
			'id',
			'section',
			'counter' 
	);
	public $id;
	public $section;
	public $counter;
	public static function IncreaseById($id) {
		global $mydb;
		$sql = "UPDATE `" . self::$tableName . "` SET `counter` = `counter` + 1 WHERE `id`= ?";
		$parameter = array ($id);
		return ($mydb->execute ( $sql, $parameter )) ? true : false;
	}
	
	public static function checkCounter($id){
		global $mydb;
		$sql="SELECT `counter` FROM ". self::$tableName. " WHERE (`id` = ?) LIMIT 1";
		$parameter = array($id);
		$result = $mydb->execute($sql, $parameter);
		$result = array_shift($result);
		return ($result->counter)? (int)$result->counter : 0;
	}
}
$ajaxChecker = new AjaxChecker();
?>