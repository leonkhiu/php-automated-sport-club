<?php
/*
 * This class is a base class, contains all methods in common between all classes
 * DBO : DataBase Object
 */
require_once ('database.php');

class DBO{
	
	private static function setInfo($record){
		global $mydb;
		//$className=get_called_class();
		$object= new static;
		foreach ($record as $attribute=> $value) {
			if($object->has_attribute($attribute)){
				$object->$attribute=$mydb->quote($value);
			}
		}
		return $object;
	}
	
	private function hasAttribute($attribute){
		//$object_vars= $this->attribute();
		$object_vars= get_object_vars($this);
		return array_key_exists($attribute , $object_vars);
	
	}
	
	private function create(){
		global $mydb;
		$className=get_called_class();
		$object= new $className;
	
		$attributes=$this->checkAttribute();
		$sql="INSERT INTO ". $object::$tableName." (";
		$sql.=implode(', ', array_keys($attributes));
		$sql.=") VALUES ('";
		$sql.=implode("', '", array_values($attributes));
		$sql.="')";

		return ($mydb->execute($sql))? true : false;
	
	}
	
	private function update(){
		global $mydb;
		$className=get_called_class();
		$object= new $className;
		$attributes=$this->checkAttribute();
	
		$attributes_pair=array();
		foreach ($attributes as $key => $value){
			$attributes_pair[]="{$key}='{$value}'";
		}
		$sql="UPDATE `". $object::$tableName."` SET ";
		$sql.=implode(", ", $attributes_pair);
		$sql.=" WHERE `id`=".$this->id;
	
		return ($mydb->execute($sql))? true : false;
	
	}
	
	private function attribute(){
		$className=get_called_class();
		$object= new $className;
	
		//return get_object_vars($object);
		$attributes=array();
		foreach ($object::$tableFields as $field){
			if(property_exists($object, $field)) {
				$attributes[$field]=$this->$field;
			}
		}
		return $attributes;
	}
	
	private function checkAttribute(){
		global $mydb;
		$attributes=array();
		foreach ($this->attribute() as $key => $value){
			$attributes[$key]=$value;
		}
		return $attributes;
	}
	
	public static function findAll($DESC=false){
		global $mydb;
		//LSB		
		$className=get_called_class();		
		$object= new $className;
		$sql = "SELECT * FROM ". $object::$tableName;
		if($DESC){
			$sql.=" ORDER BY `id` DESC";
		}
		//return $mydb->query($sql); // This one works as well
		return $mydb->execute($sql);
	}
	
	public static function findLatest($limit = 13){
		global $mydb;
		//LSB
		$className=get_called_class();
		$object= new $className;
		$sql = "SELECT * FROM ". $object::$tableName;
		$sql.=" ORDER BY `id` DESC LIMIT 13";
		
		//$mydb->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
		//$data = array($limit);
		return $mydb->execute($sql);
	}
	
	public static function findByUid($uid){
		global $mydb;
		$className=get_called_class();
		$object= new $className;
		$sql="SELECT * FROM `". $object::$tableName. "` WHERE (`uid`=?)";
		$data = array($uid);
		return $mydb->execute($sql, $data);
	}
	
	//FIXME fix this one as SQL injection
	public static function findAllPagination($perPage, $offset, $DESC=false){
		global $mydb;
		
		$className=get_called_class();
		$object= new $className;
		$sql = "SELECT * FROM ". $object::$tableName;
		$sql.=" LIMIT {$perPage} OFFSET {$offset}";
		if($DESC){
			$sql.=" ORDER BY `id` DESC";
		}
		return $mydb->execute($sql);
	}
	
	public static function findNameById($id){
		global $mydb;
		$className=get_called_class();
		$object= new $className;
		
		$sql="SELECT `name` FROM `". $object::$tableName. "` WHERE (`id` = ?) LIMIT 1";
		$parameter = array($id);
		$result = $mydb->execute($sql, $parameter);
		$result = array_shift($result);
		return $result->name;
	}
	
	public static function findByID($id=1){
		global $mydb;
		$className=get_called_class();
		$object= new $className;
		$sql="SELECT * FROM `". $object::$tableName. "` WHERE (`id`=?) LIMIT 1";
		$data = array($id);
		$found = $mydb->execute($sql, $data);
		return !empty($found)? array_shift($found) : false;
	}
	
	public static function findByField($fieldName, $fieldValue){
		global $mydb;
		$className=get_called_class();
		$object= new $className;
		$sql="SELECT * FROM `". $object::$tableName. "` WHERE (`$fieldName`=?)";
		$data = array($fieldValue);
		return $mydb->execute($sql, $data);
	}	
	
	public static function removeByID($id=0){
		global $mydb;
		$className=get_called_class();
		$object= new $className;
		$sql="DELETE FROM `". $object::$tableName. "` WHERE (`id`=?)";
		$data = array($id);
		return $mydb->execute($sql, $data);
	}
	
	public static function freeQuery($sql="", $parameters=array()){
		global $mydb;
		$sql="";
		return $mydb->execute($sql, $parameters);
		
	}
	
	public function delete(){
		global $mydb;
		$className=get_called_class();
		$object= new $className;
		$sql="DELETE FROM `". $object::$tableName."` WHERE(`id`={$this->id})";
		return ($mydb->exec($sql)) ? true : false;
		
	}
	
	public function save(){
		/// If id is set, then update, else it should creat a new one
		 return (isset($this->id)) ? $this->update() : $this->create();
	}
	
	public static function countAll(){
		global $mydb;
		$className=get_called_class();
		$object= new $className;
		$sql="SELECT COUNT(*) as total FROM ". $object::$tableName;
		$result = $mydb->execute($sql);
		$result= array_shift($result);
		return $result->total;
	}	

}
?>