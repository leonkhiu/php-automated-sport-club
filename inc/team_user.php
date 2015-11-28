<?php
require_once ('database.php');


class TeamUser extends DBO{

	protected static $tableName="team_user";
	protected static $tableFields=array('id', 'uid', 'team_id');
	
	public $id;
	public $uid;
	public $team_id;

	public static function findTeamByUid($uid){
		global $mydb;
		$sql="SELECT `team_id` FROM `". self::$tableName. "` WHERE (`uid` = ?) LIMIT 1";
		$parameter = array($uid);
		$result = $mydb->execute($sql, $parameter);
		if($result){
			$result = array_shift($result);
			return $result->team_id;
		} else{
			return 0;
		}
	}
	
} // end of : class TeamUser
$teamUser=new TeamUser();

?>