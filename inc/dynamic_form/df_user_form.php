<?php
//require_once ("../database.php");


class DFUserForm extends DBO{

	protected static $tableName="df_user_form";
	protected static $tableFields=array('id', 'form_id', 'element_id', 'question', 'help_text', 'pattern', 'required');
	
	public $id;
	public $form_id;
	public $element_id;
	public $question;
	public $help_text;
	public $pattern;
	public $required;
	
	public static function findElements($formId){
		global $mydb;
		$className=get_called_class();
		$object= new $className;
		$sql="SELECT * FROM ". $object::$tableName. " WHERE (`form_id`=?)";
		$data = array($formId);
		return $mydb->execute($sql, $data);	
	}
	
	
}

$dFUserForm = new DFUserForm();

?>