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
}
?>