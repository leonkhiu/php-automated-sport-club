<?php
class Session {
	private $loggedIn = false;
	public $uid;
	public $message;
	function __construct() {
		session_start ();
		$this->checkMessage ();
		$this->checkLogin ();
		
		if ($this->loggedIn) {
			// user loged in ... do sth
		} else {
			// user no logged in ... do sth else
		}
	}
	public function isLoggedIn() {
		return $this->loggedIn;
	}
	public function login($user) {
		// database should find user , username/password by authentication function
		if ($user) {
			$this->uid = $_SESSION ['uid'] = $user->id;
			$_SESSION ['username'] = $user->username;
			$this->loggedIn = true;
		}
	}
	public function logout() {
		unset ( $_SESSION ['uid'] );
		unset ( $this->uid );
		$this->loggedIn = false;
	}
	private function checkLogin() {
		if (isset ( $_SESSION ['uid'] )) {
			$this->uid = $_SESSION ['uid'];
			$this->loggedIn = true;
		} else {
			unset ( $this->uid );
			$this->loggedIn = false;
		}
	}
	private function checkMessage() {
		if (isset ( $_SESSION ['message'] )) {
			$this->message = $_SESSION ['message'];
			unset ( $_SESSION ['message'] );
		} else {
			$this->message = "";
		}
	}
	public function message($msg = "") {
		if (! empty ( $msg )) {
			// set message
			$_SESSION ['message'] = $msg;
		} else {
			// get message
			return $this->message;
		}
	}
} // end of : calss Session

$session = new Session ();
$message = $session->message ();

?>