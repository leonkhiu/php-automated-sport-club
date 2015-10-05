<?php
//require_once ('../database.php');


class DFElementGroup extends DBO{

	protected static $tableName="df_element_group";
	protected static $tableFields=array('id', 'form_id', 'parent_id', 'text');
	
	public $id;
	public $form_id;
	public $parent_id;
	public $text;
		
	public static function findChildren($formId, $parentId){
		global $mydb;
		$sql="SELECT * FROM ". self::$tableName. " WHERE (`form_id`=?) AND (`parent_id`=?)";
		$data = array($formId, $parentId);
		return $mydb->execute($sql, $data);
	}

	public static function removebyFormId($formId){
		global $mydb;
		$sql="DELETE FROM `". self::$tableName."` WHERE(`form_id`= ?)";
		$data = array($formId);
		return ($mydb->execute($sql, $data)) ? true : false;
	}
	
}
$dFElementGroup = new DFElementGroup();

?>