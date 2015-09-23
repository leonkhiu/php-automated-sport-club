<?php
require_once '../inc/initialise.php';
$messages=array();

cookieLogin(WEBSITE_NAME.'_uname', WEBSITE_NAME.'_pass');

if (!$session->isLoggedIn()){
	redirectTo ( "../signin.php" );
}
$uid = isset($_SESSION ['uid'] )? $_SESSION ['uid'] : 0;
$uname = isset($_SESSION['username']) ? $_SESSION ['username'] : null;
$thisUser = User::findByID($uid);

$sweetAlertRequirement = $welcomeAlert = $paginationRequirement = $jQueryUI = false;

$additionalCss = $additionalJS ='';