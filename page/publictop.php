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
<link href="css/bootstrap.min.css" rel="stylesheet">
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
			      <a class="navbar-brand" href="index.php">Automated Sport Club</a>
			    </div>
			
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav" id="navbar-link-container">
			        <li class=""><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
			        <li class=""><a href="live/">Live Scores</a></li>
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
			        <button type="submit" class="btn btn-default">Search</button>
			      </form>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="signin.php">Log in</a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			
			

		</div>
	</div>
