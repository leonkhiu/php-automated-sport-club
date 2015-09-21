<?php
require_once '../inc/initialise.php';

if (!$session->isLoggedIn()){
	redirect_to ( "../signin.php" );
}
$uid = isset($_SESSION ['uid'] )? $_SESSION ['uid'] : null;
$uname = isset($_SESSION['username']) ? $_SESSION ['username'] : null;
$thisUser = User::findByID($uid);