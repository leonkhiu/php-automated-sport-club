<?php
require_once ('database.php');


class SystemLog extends DBO{

	protected static $tableName="system_log";
	protected static $tableFields=array('uid', 'msg', 'date');
	
	public $uid;
	public $msg;
	public $date;	
}
?>