<?php
//require_once ("../database.php");


class DFForm extends DBO{

	protected static $tableName="df_form";
	protected static $tableFields=array('id', 'uid', 'sport_id', 'title', 'description', 'token', 'permission_id', 'date', 'last_update', 'update_uid');
	
	public $id;
	public $uid;
	public $sport_id;
	public $title;
	public $description;
	public $token;
	public $permission_id;	
	public $date;
	public $last_update;
	public $update_uid;
	
}

$dFForm = new DFForm();

?>