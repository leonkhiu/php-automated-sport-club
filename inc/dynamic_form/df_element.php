<?php
//require_once ('../database.php');


class DFElement extends DBO{

	protected static $tableName="df_element";
	protected static $tableFields=array('id', 'type', 'explain');
	
	public $id;
	public $type;
	public $explain;	
	

}

?>