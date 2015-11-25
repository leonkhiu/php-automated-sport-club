<?php
require_once("layout/top.php");
$sweetAlertRequirement = true;
$title = "Administrator";

#-----------------------------------------check for welcome alert after login
$previousPage = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] :'';
$tmpArray = explode("/", $previousPage);
$previousFile=$tmpArray[(count($tmpArray)-1)];
if($previousFile == "signin.php"){
	$welcomeAlert= true;
}

//$additionalJS .='<script src="../js/sport-club.js"></script>';

require_once ("layout/htmltop.php");
?>
<h2>Welcome <?php echo ucfirst($thisUser->fname)." ". ucfirst($thisUser->lname); ?>, <small>Production version</small></h2>

<?php
	
	//$user = User::findByID(50);
	
	/*
	$buser = new User();	
	print_r($buser->findByID(2));
	*/
	
	
	/*
	$user->id = 50;
	$user->delete();
	*/

	
	/*
	echo "<br>";
	$ben = new User();
	$ben->id=59;	
	$ben->fname = "";
	$ben->lname = "";
	$ben->username = "abcde";
	$ben->hashpassword= makeHash("");	
	echo ($ben->save())? "updated" : "Not updated";
	
	echo "<hr>";
	$allUsers = User::findAll();
	echo "<pre>";
	//var_dump($allUsers);
	echo "</pre>";	
	*/
	
	/*
	echo "<br>";
	$ben->id= 32;
	echo "<pre>";
	echo ($ben->delete())? "deleted..." : "Not deleted";
	echo "</pre>";
	*/
	/*
	$thisUser = User::authentication("sandyfan", makeHash("azadeh000"));
	//echo $thisUser->username;
	$session->login($thisUser);
*/


require_once ('layout/htmlbuttom.php');
?>