<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="favicon.ico">

<title>Signin</title>


<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/signin.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<div class="container">
		<div class="col-md-6 col-md-offset-3">
			<form class="form-horizontal">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail3"
							placeholder="Email" required="required">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="inputPassword3"
							placeholder="Password" required="required">
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Security
						question</label>
					<div class="col-sm-10">
						<p class="form-control-static">What is the 6th month?</p>
					</div>
				</div>


				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Answer</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputAnswer"
							placeholder="Answer the question" required="required">
					</div>
				</div>


				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							<label> <input type="checkbox"> Remember me
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Sign in</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- /container -->



</body>
</html>
