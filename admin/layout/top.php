<?php
require_once '../inc/initialise.php';
$messages=array();

if (!$session->isLoggedIn()){
	redirectTo ( "../signin.php" );
}
$uid = isset($_SESSION ['uid'] )? $_SESSION ['uid'] : null;
$uname = isset($_SESSION['username']) ? $_SESSION ['username'] : null;
$thisUser = User::findByID($uid);

$sweetAlertRequirement = $welcomeAlert = $paginationRequirement = false;