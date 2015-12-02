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

<div class="progress">
  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
    Security 70%
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
    Dynamic Forms 80%
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
    Live Score 80%
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
    Permissions 50%
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
    Tournaments 30%
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
  Responsive 70%
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
    Public Section 20%
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
    Tracking System 90%
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
    DB design 85%
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
    Dynamic rules 50%
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
    Application dynamic settings 60%
  </div>
</div>


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