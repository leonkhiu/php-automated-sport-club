<?php
require_once ('database.php');


class GroupTeam extends DBO{

	protected static $tableName="group_team";
	protected static $tableFields=array('id', 'group_id', 'team_id');
	
	public $id;
	public $group_id;
	public $team_id;	
	
	public static function findBygroupID($groupId=1){
		global $mydb;
		$sql="SELECT `team_id` FROM `". self::$tableName. "` WHERE (`group_id`=?)";
		$data = array($groupId);
		return $mydb->execute($sql, $data);
	}
	
	
} // end of : class GroupTeam
$groupTeam=new GroupTeam();

?>