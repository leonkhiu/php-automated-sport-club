<?php
require_once '../inc/initialise.php';

systemLog ( $_SESSION ['uid'], "Log out" );
$message = $session->message;

// clear all session variable
$_SESSION = array ();

// clear all session cookies
if (isset ( $_COOKIE [session_name ()] )) {
	setcookie ( session_name (), '', time () - 31556926);
}

// Clear cookies
rememberMe(false);

$session->logout ();
$session->message ( $message );
redirectTo ( "../index.php" );
?>