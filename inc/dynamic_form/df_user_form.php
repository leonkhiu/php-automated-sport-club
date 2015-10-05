<?php
//require_once ("../database.php");


class DFUserForm extends DBO{

	protected static $tableName="df_user_form";
	protected static $tableFields=array('id', 'form_id', 'element_id', 'question', 'help_text', 'pattern', 'element_order', 'required');
	
	public $id;
	public $form_id;
	public $element_id;
	public $question;
	public $help_text;
	public $pattern;
	public $element_order;
	public $required;
	
	public static function findElements($formId){
		global $mydb;
		$sql="SELECT * FROM ". self::$tableName. " WHERE (`form_id`=?)";
		$data = array($formId);
		return $mydb->execute($sql, $data);	
	}
	
	public static function removebyFormId($formId){
			global $mydb;
			$sql="DELETE FROM `". self::$tableName."` WHERE(`form_id`= ?)";
			$data = array($formId);
			return ($mydb->execute($sql, $data)) ? true : false;		
	}
	
}

$dFUserForm = new DFUserForm();

?>