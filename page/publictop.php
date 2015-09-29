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
						<a class="navbar-brand" href="index.php">Sport Club</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li><a href="#about">About</a></li>
							<!-- <li class="active"><a href="#">Live scores</a></li> -->
							<li><a href="live/">Live scores</a></li>
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
