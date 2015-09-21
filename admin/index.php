<?php
require_once("layout/top.php");

$title = "Administrator-Home-Welcome $uname";
$additionalCss = '';
$additionalJS = '';
require_once ("layout/htmltop.php");



?>


<h2>Welcome <?php echo ucfirst($thisUser->fname)." ". ucfirst($thisUser->lname); ?>, <small>Production version</small></h2>
<p>
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
	
	
	$log = new SystemLog();
	$log->uid = $_SESSION['uid'];
	$log->msg = $thisUser->username. " login to the system and viewed the admin/index.php";
	$log->date = time();
	$log->save();
	*/
?>
</p>
<?php
require_once ('layout/htmlbuttom.php');;
?>