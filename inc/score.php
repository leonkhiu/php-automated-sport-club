<?php
require_once ('database.php');


class Score extends DBO{
	
	protected static $tableName="score";
	protected static $tableFields=array('id', 'game_id', 't1_point', 't2_point', 'set_number', 'duration', 'date', 'update_uid');
	
	public $id;
	public $game_id;
	public $t1_point;
	public $t2_point;
	public $set_number;
	public $duration;
	public $date;
	public $update_uid;
	
	public static function findByUidGameId($uid, $gameId){
		global $mydb;
		$sql="SELECT * FROM `". self::$tableName. "` WHERE (`update_uid` = ?) AND(`game_id` = ?) LIMIT 1";
		$parameter = array($uid, $gameId);
		$found = $mydb->execute($sql, $parameter);
		return !empty($found)? array_shift($found) : false;
	}
	
	public static function isCorrect($gameId){
		global $mydb;
		$sql="SELECT * FROM `". self::$tableName. "` WHERE (`game_id` = ?)";
		$parameter = array($gameId);
		$result = $mydb->execute($sql, $parameter);
		if(count($result) == 2){
			//correct
			if((int)$result[0]->t1_point == (int)$result[1]->t1_point && (int)$result[0]->t2_point == (int)$result[1]->t2_point){
				return true;	
			}
			
		} else{
			//some thing wrong
			//maybe only one user submit or more than 2 user submit for one game which is impossible
			return false;
		}
	}
	
	public static function gameResult($gameId) {
		global $mydb;
		
		//All return result is for the HOST team
		if (self::isCorrect ( $gameId )) {
			$sql = "SELECT * FROM `" . self::$tableName . "` WHERE (`game_id` = ?) LIMIT 1";
			$parameter = array (
					$gameId 
			);
			$result = $mydb->execute ( $sql, $parameter );
			$result = array_shift ( $result );
			
			if (( int ) $result->t1_point == ( int ) $result->t2_point) {
				return "draw";
			} else if(( int ) $result->t1_point > ( int ) $result->t2_point){
				return "win";
			} else{
				return "loss";
			}
		}
	}
	
	
	public static function hasUserSubmitted($uid, $gameId){
		global $mydb;
		$sql="SELECT COUNT(*) as total FROM `". self::$tableName. "` WHERE (`update_uid` = ?) AND(`game_id` = ?)";
		$parameter = array($uid, $gameId);
		$result = $mydb->execute($sql, $parameter);
		return (count($result) > 0 && array_shift($result)->total > 0)? true : false;
	}
	
} // end of : class Score
$score=new Score();

?>