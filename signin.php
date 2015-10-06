<?php
require_once 'inc/initialise.php';
$messages = array();

if(cookieLogin(WEBSITE_NAME.'_uname', WEBSITE_NAME.'_pass')){
	redirectTo("admin/index.php");
}

if ($session->isLoggedIn()){
	redirectTo ( "admin/index.php" );
}
#-------------------------Form submition
if(isset($_POST["signin"])){
	$uname		=trim($_POST['uname']);
	$password	=$_POST['password'];
	$thisUser = User::authentication($uname, makeHash($password));
	if($thisUser){
		if(User::isAcrive($thisUser->id)){
			$session->login($thisUser);
			systemLog($thisUser->id, "Logged in");
			if(isset($_POST['rememberMe'])){
				//cookie
				rememberMe(true, $uname, makeHash($password));
			}
			redirectTo("admin/index.php");
		}else{
			// is not active
			$messages[] = "This user is not active!";
			unset($thisUser);
		}
	} else{
		//user not found
		$messages[] = "Incorrect username or password!";
	}
}

$title = "Sign in";
$additionalCss = '<link href="css/custom.css" rel="stylesheet">';
$additionalJS = '';
require_once ("page/publictop.php");
?>
<div class="container">
<?php echo showMessage($messages); ?>
<div class="row login-form">
	<form class="middle col-md-4 col-md-offset-4 col-sx-4 col-sx-offset-4 col-sm-4 col-sm-offset-4" method="POST">
		
		<div class="form-group">
			<label for="inputuname">Username</label>			
			<input type="text" class="form-control" id="inputuname"	placeholder="Username" name="uname" required="required">			
		</div>
		
		<div class="form-group">
			<label for="inputPassword3">Password</label>			
			<input type="password" class="form-control" id="inputPassword3"	placeholder="Password" name="password" required="required">			
		</div>
		
		<div class="form-group">			
			<div class="checkbox">
				<label> <input type="checkbox" name="rememberMe"> Remember me	</label>				
			</div>			
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary" name="signin">Sign in</button>
			</div>
		</div>
	</form>
</div>
<?php
require_once ("page/publicbuttom.php");
?>		