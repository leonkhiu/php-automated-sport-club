<?php

class pagination{
	
	public $currentPage;
	public $perPage;
	public $totalCount;
	
	
	public function __construct($currentPage=1, $perPage=20, $totalCount=0){
		$this->currentPage=(int)$currentPage;
		$this->perPage=(int)$perPage;
		$this->totalCount=(int)$totalCount;
		
	}
	
	public function totalPage(){
		return ceil($this->totalCount / $this->perPage);
	}
	
	public function nextPage(){
		return $this->currentPage+1;
	}
	
	public function perviousPage(){
		return $this->currentPage -1;
	}
	
	public function hasPerviousPage(){
		return $this->perviousPage() >=1 ? true : false;
	}
	
	public function hasNextPage(){
		return $this->nextPage() <= $this->totalPage() ? true : false;
	}
	
	public function offset(){
		return ($this->currentPage -1 ) * $this->perPage;
	}
	
}

?>