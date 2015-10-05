<?php
require_once ('database.php');


class Game extends DBO{

	protected static $tableName="game";
	protected static $tableFields=array('id', 'group_id', 'form_id', 'first_team_id', 'second_team_id', 'date', 'update_uid', 'done');
	
	public $id;
	public $group_id;
	public $form_id;
	public $first_team_id;
	public $second_team_id;
	public $date;
	public $update_uid;
	public $done;
	

	public static function findByTeamID($teamId=1){
		global $mydb;
		$sql="SELECT * FROM `". self::$tableName. "` WHERE (`first_team_id`=?) OR (`second_team_id`=?)";
		$data = array($teamId, $teamId);
		return $mydb->execute($sql, $data);
	}
	
	public static function findByFirstTeamID($teamId=1){
		global $mydb;
		$sql="SELECT * FROM `". self::$tableName. "` WHERE (`first_team_id`=?)";
		$data = array($teamId);
		return $mydb->execute($sql, $data);
	}
	
	/**
	 * Used in LIVE SCORE
	 * @param number $groupId
	 * @param boolean $done
	 * @return object:
	 */
	public static function findByGroupId($groupId, $done= false){
		global $mydb;
		$sql="SELECT * FROM `". self::$tableName. "` WHERE (`group_id`=?)";
		if($done){
			$sql.=" AND (`done` = 1)";
		}
		$data = array($groupId);
		return $mydb->execute($sql, $data);
	}
	
	public static function MakeDone($id){
		global $mydb;
		$sql="UPDATE `" . self::$tableName . "` SET `done` = 1 WHERE (id = ?)"; 
		$parameter = array($id);
		return $mydb->execute($sql, $parameter);			
	}
	
	public static function isDone($id){
		global $mydb;
		$sql="SELECT `done` FROM `". self::$tableName. "` WHERE (id = ?)";
		$parameter = array($id);
		$mydb->execute($sql, $parameter);
		$result = array_shift($result);
		return ($result->done == 1)? true : false;
		
	}
	
} // end of : class Game
$game=new Game();

?>