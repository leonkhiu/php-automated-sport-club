<?php
require_once '../inc/initialise.php';

$start = $ajaxChecker->checkCounter(1);
$startScore = $ajaxChecker->checkCounter(1);

$title = "Live";
$additionalCss = '';
$additionalJS = '<script src="../js/prototype.js"></script>';
$additionalJS.= '<script src="../js/sport-club.js"></script>';
$additionalJS.="
		<script>
			//Every half minute call a function check
			setInterval(\"checkCounter('form_checker.php',$('old_count'),$('new_count'),'updateMe','forms.php');\",100000); 
			// When the page is loading we set the initial counter value
			window.onload=function(){
  				$('old_count').update('$start');
			}
		</script>
		";
		
$additionalJS.="
<script>
	setInterval(\"checkCounter('score_checker.php',$('score_old_count'),$('score_new_count'),'updateMe2','scores.php');\",100000);
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

			<nav class="navbar navbar-inverse navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed"
							data-toggle="collapse" data-target="#navbar"
							aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span> <span
								class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Sport Club</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li><a href="#about">About</a></li>
							<!-- <li class="active"><a href="#">Live scores</a></li> -->
							<li><a href="#">Live scores</a></li>
							<li><a href="#">Tables</a></li>

							<li class="dropdown"><a href="#" class="dropdown-toggle"
								data-toggle="dropdown" role="button" aria-haspopup="true"
								aria-expanded="false">Sport<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li class="dropdown-header">With ball</li>
									<li><a href="#">Football</a></li>
									<li><a href="#">Basketball</a></li>
									<li><a href="#">Tennis</a></li>
									<li role="separator" class="divider"></li>
									<li class="dropdown-header">Without ball</li>
									<li><a href="#">Swimming</a></li>
									<li><a href="#">Chess</a></li>
								</ul></li>
							<li><a href="#contact">Contact</a></li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right">
					        <li><a href="signin.php">Sign in</a></li>
					    </ul>
						<form class="navbar-form navbar-left" role="search">
					        <div class="form-group">
					          <input type="text" class="form-control" placeholder="What are you looking for?">
					        </div>
					        <button type="submit" class="btn btn-info">Search</button>
					      </form>
						
					</div>
				</div>
			</nav>

		</div>
	</div>
<!-- *********************End top -->	
<div class="container">
	<div class="row">
	
	<p id="score_old_count" class="hide"><?php echo $startScore; ?></p>
	<p id="score_new_count" class="hide"></p>	
	
	<div id="updateMe2"><?php require_once 'scores.php'; ?></div>
	
	<p id="old_count" class="hide"><?php echo $start; ?></p>
	<p id="new_count" class="hide"></p>	
	
	<div id="updateMe"><?php //require_once 'forms.php'; ?></div>
	
	
	</div>
</div>

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