<?php
//require_once ('../database.php');


class DFAnswer extends DBO{

	protected static $tableName="df_answer";
	protected static $tableFields=array('id', 'user_form_id', 'uid', 'answer');
	
	public $id;
	public $user_form_id;
	public $uid;
	public $answer;
	
}

?>