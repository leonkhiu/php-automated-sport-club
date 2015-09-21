<?php
require_once 'inc/initialise.php';
$messages = array();

$sq = SecurityQuestion::randomOne();
#-------------------------Form submition
if(isset($_POST["signin"])){
	$sqId = $_POST['securityQuestionId'];
	$sQuestion = SecurityQuestion::findByID($sqId);
	if($sQuestion){
		$correctAnswer = ($sQuestion->answer == strtolower($_POST['answer']))? true : false;			
		}
	if($correctAnswer){
		$uname		=trim($_POST['uname']);
		$password	=$_POST['password'];
		$thisUser = User::authentication($uname, makeHash($password));
		if($thisUser){
			if(User::isAcrive($thisUser->id)){
				$session->login($thisUser);
				systemLog($thisUser->id, "Logged in");
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
	} else {
		// answer is not correct
		$messages[] = "Your answer is not correct!";
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
			<label for="securityInput"><?php echo $sq->question; ?></label>			
			<input type="text" class="form-control" id="securityInput" name="answer" placeholder="Not case sensetive" required="required">
			<input type="hidden" name="securityQuestionId" value="<?php echo $sq->id; ?>">			
		</div>
		
		<div class="form-group">			
			<div class="checkbox">
				<label> <input type="checkbox"> Remember me	</label>				
			</div>			
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary" name="signin">Sign in</button>
			</div>
		</div>
	</form>
</div>
</div>
<?php
require_once ("page/publicbuttom.php");
?>		