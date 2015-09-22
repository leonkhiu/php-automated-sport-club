<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="MoHo">
<link rel="icon" href="favicon.ico">

<title><?php echo $title;?></title>

<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<!-- <link href="../css/carousel.css" rel="stylesheet">  -->
<?php 
if($sweetAlertRequirement){
	echo '<link href="../css/sweetalert.css" rel="stylesheet" />';
}
?>
<link href="../css/adminonly.css" rel="stylesheet">

<?php echo $additionalCss; ?>
</head>
<!-- NAVBAR
================================================== -->
<?php 
if($welcomeAlert){
	echo "<body onload='welcomeAlert(\"$uname\")'>";	
} else{
	echo "<body>";
}
?>
	
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Online Sport Club</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <!-- 
          <div class="jumbotron">
            <h1>Hello, world!</h1>
            <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
          </div>
           -->
          <div class="row">
          	<div class="col-xs-6 col-lg-12">
          	<noscript>
				<div class="alert alert-danger" role="alert">
					 <strong>JavaScript is disabled!</strong> For full functionality of this site it is necessary to enable JavaScript.
					 Here are the <a href="http://www.enable-javascript.com/" target="_blank">
					 instructions how to enable JavaScript in your web browser</a>.
			 	</div>
			</noscript>
			<?php echo showMessage($messages); ?>