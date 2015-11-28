<?php
require_once '../inc/initialise.php';
$start = $ajaxChecker->checkCounter(1);
$startScore = $ajaxChecker->checkCounter(1);

$title = "Live";
$additionalCss = '<link href="../css/custom.css" rel="stylesheet">';
$additionalJS = '<script src="../js/prototype.js"></script>';
$additionalJS.= '<script src="../js/sport-club.js"></script>';
$additionalJS.="
		<script>
			//Every half minute call a function check
			setInterval(\"checkCounter('form_checker.php',$('old_count'),$('new_count'),'updateMe','forms.php');\",15000); 
			// When the page is loading we set the initial counter value
			window.onload=function(){
  				$('old_count').update('$start');
			}
		</script>
		";
		
$additionalJS.="
<script>
	setInterval(\"checkCounter('score_checker.php',$('score_old_count'),$('score_new_count'),'updateMe2','scores.php');\",15000);
	window.onload=function(){
		$('old_count').update('$startScore');
	}
</script>
";


?>
<!-- ***************************TOP -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="MoHo">
<link rel="shortcut icon" href="favicon.png">

<title><?php echo $title;?> - Sport Club</title>

<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<?php echo $additionalCss; ?>
</head>
<!-- NAVBAR
================================================== -->
<body>
	<div class="navbar-wrapper">
		<div class="container">

<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="../index.php">Automated Sport Club</a>
			    </div>
			
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav" id="navbar-link-container">
			        <li class=""><a href="../index.php">Home</a></li>
			        <li class="active"><a href="index.php">Live Scores<span class="sr-only">(current)</span></a></li>
			        <li class=""><a href="#">Latest news</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sports <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Football</a></li>
			            <li><a href="#">Rugby</a></li>
			            <li><a href="#">Basketball</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Chess</a></li>
			            <li><a href="#">Swimming</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">List of all sports</a></li>
			          </ul>
			        </li>
			        <li class=""><a href="#">Contact us</a></li>
			      </ul>
			      <form class="navbar-form navbar-left" role="search">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Looking for...">
			        </div>
			        <button type="submit" class="btn btn-default">Submit</button>
			      </form>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="../signin.php">Log in</a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>


		</div>
	</div>
<?php //require_once ("../page/publictop.php"); ?>
	
<!-- *********************End top -->	
<div class="container">
	<div class="row">
	<p id="score_old_count" class="hide"><?php echo $startScore; ?></p>
	<p id="score_new_count" class="hide"></p>	
	<div id="updateMe2" class="col-xs-12 col-md-8"><?php require_once 'scores.php'; ?></div>
	</div>
	
	<!-- 
	<div class="row">
	<p id="old_count" class="hide"><?php //echo $start; ?></p>
	<p id="new_count" class="hide"></p>	
	<div id="updateMe" class="col-xs-12 col-md-6"><?php //require_once 'forms.php'; ?></div>
	</div>
	 -->

<!-- **********************************Bottom -->
<hr class="featurette-divider">

		<!-- /END THE FEATURETTES -->
		<!-- FOOTER -->
		<footer>
			
			<p>
				&copy; 2015 Sport Club, Inc. &middot; <a href="#">Privacy</a>
				&middot; <a href="#">Terms</a>
			</p>
		</footer>

	</div>
	<!-- /.container -->

<!-- ----------------JAVASCRIPT---------------------- -->
 
 	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!--[if lte IE 8]>
   		 <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    	 <script>window.jQuery || document.write('<script src="../js/jquery-1.11.3.min.js"><\/script>')</script>
	<![endif]-->
	
	<!--[if gt IE 8]><!-->
	    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	    <script>window.jQuery || document.write('<script src="../js/jquery-2.1.4.min.js"><\/script>')</script>
	<!--<![endif]-->

	<script src="../js/bootstrap.min.js"></script>
		
	<?php echo $additionalJS;?>
</body>
</html>