<?php
require_once ('config.php');
class myPDO {
	
	private $link;
	private $effectedRows = 0;
	private $lastQuery;
	public  $lastPreparedQuery;
	
	function __construct($dbtype = PDO_DB) {
		try {
			
			if ($dbtype === "mysql") {
				$this->link = new PDO ( "mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS );
				$connectionResult = true;
			} elseif ($dbtype === "sqlite") {
				$this->link = new PDO ( "sqlite:DB/mydb.sqlite" );
				$connectionResult = true;
			} else {
				$connectionResult = false;
				die ("<br>Choose the correct form of database<br>");
			}
		} catch ( PDOException $e ) {
			echo $e->getMessage ();
			$connectionResult = false;
		}
		return $connectionResult;
	}
	
	public function closeMe() {
		if (isset ( $this->link )) {
			unset ( $this->link );
		}
	}
	
	public function query($sql) {
		$this->lastQuery = $sql;
		// echo "SQL query: <pre>".$this->lastQuery."</pre>";
		$result = $this->link->query ( $sql );
		// $this->effectedRows = $result->rowCount();
		//return $result->fetchAll ();
		return $result->fetchAll (PDO::FETCH_ASSOC);
	}
	
	public function exec($sql) {
		$this->lastQuery = $sql;
		// echo "SQL query: <pre>".$this->lastQuery."</pre>";
		return $this->link->exec ( $sql );
	}
	
	public function execute($sql, $parameters = array()) {
		$statement =  $this->link->prepare ( $sql );
		$this->lastQuery = $sql;
		if(empty($parameters)){
			$result = $statement->execute ();
		}else{
			$result = $statement->execute ( $parameters );
		}
		//$this->effectedRows = $statement->rowCount ();
		$sqlType = substr($sql, 0, 6);
		if(strtolower($sqlType) ==="select"){
			//there was a SELECT query
			return $statement->fetchAll (PDO::FETCH_CLASS);
		} else{
			//There was UPDATE, INSERT, DELETE query
			//return $result;
			return $statement->rowCount();
		}
	}
	
	public function effectedRows() {
		return $this->effectedRows;
	}
	
	public function LastInsertedId() {
		return $this->link->lastInsertId();
	}
	
	public function lastQuery(){
		return "<pre>".$this->lastQuery."</pre>";
	}
	
	public function fetchArray($result){
		
	}
	
	public function rowCount(){
		return $this->rowCount();
	}

	public function errorInfo(){
		return $this->link->errorInfo();
		
	}
}

$mydb = new myPDO ();
?>