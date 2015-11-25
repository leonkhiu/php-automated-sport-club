<?php
require_once ('database.php');


class UserPermission extends DBO{

	protected static $tableName="user_permission";
	protected static $tableFields=array('id', 'uid', 'permission_id');
	
	public $id;
	public $uid;
	public $permission_id;
	
	public static function findByUid33($uid){
		global $mydb;
		$sql="SELECT * FROM `". self::$tableName. "` WHERE (`uid`=?)";
		$data = array($uid);
		return $mydb->execute($sql, $data);
	}
	
	public static function hasPermission($uid, $activityPermission){
		$userPermissions = self::findByUid($uid);
		foreach ($userPermissions as $tmpPer){
			$allPermissions[] = $tmpPer->permission_id; 
		}
		return (in_array($activityPermission, $allPermissions))? true : false;
	}
	

	
} // end of : class UserPermission

?>