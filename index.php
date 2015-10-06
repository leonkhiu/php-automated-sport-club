<?php 
$title = "Home";
$currentFile=basename ( $_SERVER ['PHP_SELF'] );
$additionalCss = '<link href="css/carousel.css" rel="stylesheet">';
$additionalJS = '';
require_once ("page/publictop.php");
?>


	<!-- Carousel
    ================================================== -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img class="first-slide"
					src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
					alt="First slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>Wimbledon 2015: 29 June-12 July</h1>
						<p>Wimbledon, is the oldest tennis tournament in the world, and
							widely considered to be the biggest and the most prestigious. It
							has been held at the All England Club in Wimbledon, London since
							1877. It is one of the four Grand Slam tennis tournaments, the
							other three majors being the Australian Open, French Open and US
							Open. Wimbledon is the only Major still played on grass, the
							game's original surface, which gave the game its original name of
							"lawn tennis".</p>
						<p>
							<a class="btn btn-lg btn-primary" href="#" role="button">Read
								more</a>
						</p>
					</div>
				</div>
			</div>

			<div class="item">
				<img class="second-slide"
					src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
					alt="Second slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>
							<code>Quiz:</code>
							Whose lion is it anyway?
						</h1>
						<p>How many of these famous football lions can you identify in our
							interactive quiz?</p>
						<p>
							<a class="btn btn-lg btn-primary" href="#" role="button">Let's
								begin</a>
						</p>
					</div>
				</div>
			</div>

			<div class="item">
				<img class="third-slide"
					src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
					alt="Third slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>Can English cricket renew the glory of 2005?</h1>
						<p>With viewing figures and participation numbers falling, can
							England's cricketers engage the nation again, asks Tom Fordyce.</p>
						<p>
							<a class="btn btn-lg btn-primary" href="#" role="button">Read
								more</a>
						</p>
					</div>
				</div>
			</div>

			<div class="item">
				<img class="fourth-slide"
					src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
					alt="Fourth slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>Rory McIlroy's Open absence would disappoint Jordan Spieth</h1>
						<p>Double major winner Jordan Spieth says Rory McIlroy's absence
							from the Open will "dampen" the occasion and is hoping the
							defending champion can recover from injury in time to play.</p>
						<p>
							<a class="btn btn-lg btn-primary" href="#" role="button">Read
								more</a>
						</p>
					</div>
				</div>
			</div>

		</div>
		<a class="left carousel-control" href="#myCarousel" role="button"
			data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"
			aria-hidden="true"></span> <span class="sr-only">Previous</span>
		</a> <a class="right carousel-control" href="#myCarousel"
			role="button" data-slide="next"> <span
			class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- /.carousel -->


	<!-- Marketing messaging and featurettes
    ================================================== -->
	<!-- Wrap the rest of the page in another container to center all the content. -->

	<div class="container marketing">

		<!-- Three columns of text below the carousel -->
		<div class="row">
			<div class="col-lg-4">
				<img class="img-circle" src="images/ashkan.jpg"
					alt="Generic placeholder image" width="140" height="140">
				<h2>Ashkan Dejagah</h2>
				<p>Seyed Ashkan Dejagah, known as Ashkan Dejagah, is an Iranian
					professional footballer who plays for Al-Arabi in the Qatar Stars
					League, usually as an attacking midfielder or a right winger</p>
				<p>
					<a class="btn btn-default" href="#" role="button">View details
						&raquo;</a>
				</p>
			</div>
			<!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="images/jahanbakhsh.jpg"
					alt="Generic placeholder image" width="140" height="140">
				<h2>Jahan Bakhsh</h2>
				<p>Alireza Jahanbakhsh is an Iranian professional footballer who
					plays for Eredivisie side NEC and the Iranian national team as a
					right and left winger. He represented Iran at the 2014 FIFA World
					Cup and the 2015 AFC Asian Cup.</p>
				<p>
					<a class="btn btn-default" href="#" role="button">View details
						&raquo;</a>
				</p>
			</div>
			<!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="images/ali.jpg"
					alt="Generic placeholder image" width="140" height="140">
				<h2>Ali Karimi</h2>
				<p>Ali Karimi(born 8 November 1978) is a retired Iranian footballer.
					He has played for Fath Tehran, Persepolis, Al-Ahli Dubai, Bayern
					Munich, Qatar SC, Steel Azin, Schalke 04, Tractor Sazi, and the
					Iran national team for which he scored 38 goals in 127 appearances.
					In 2004 he became the fourth Iranian player to win the Asian
					Footballer of the Year.</p>
				<p>
					<a class="btn btn-default" href="#" role="button">View details
						&raquo;</a>
				</p>
			</div>
			<!-- /.col-lg-4 -->
		</div>
		<!-- /.row -->


		<!-- START THE FEATURETTES -->

		<hr class="featurette-divider">

		<div class="row featurette">
			<div class="col-md-7">
				<h2 class="featurette-heading">
					Djokovic <span class="text-muted">through to quarter-finals.</span>
				</h2>
				<p class="lead">Defending champion Novak Djokovic moved into the
					Wimbledon quarter-finals after a delayed five-set win over Kevin
					Anderson. The world No 1 fought from two sets down to even the
					match on Monday before bad light called a halt to proceedings on
					Court One but he took the fifth set 7-5 in another evenly-matched
					contest.</p>
			</div>
			<div class="col-md-5">
				<img class="featurette-image img-responsive center-block"
					data-src="holder.js/500x500/auto" alt="Generic placeholder image"
					src="images/01.jpg">
			</div>
		</div>

		<hr class="featurette-divider">

		<div class="row featurette">
			<div class="col-md-7 col-md-push-5">
				<h2 class="featurette-heading">
					Maria Sharapova<span class="text-muted"> reaches Wimbledon
						semi-finals with win over Coco Vandeweghe</span>
				</h2>
				<p class="lead">Maria Sharapova battled into her first Wimbledon
					semi-final since 2011 with a 6-3 6-7 (3/7) 6-2 victory over
					American Coco Vandeweghe on Tuesday. After a relatively untroubled
					first set on Centre Court, fourth seed Sharapova lost a hugely
					entertaining second as the two players slugged it out. Vandeweghe,
					the only unseeded player in the last eight, showed plenty of grit,
					not least when breaking as Sharapova served for the match at 5-4 in
					the second set, whipping up the fans on the show court in the
					process.</p>
			</div>
			<div class="col-md-5 col-md-pull-7">
				<img class="featurette-image img-responsive center-block"
					data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="images/02.jpg">
			</div>
		</div>
<?php
require_once ("page/publicbuttom.php");
?>		