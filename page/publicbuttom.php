<hr class="featurette-divider">

		<!-- /END THE FEATURETTES -->
		<!-- FOOTER -->
		<footer>
			
			<p>
				&copy; 2015 AutomatedSportClub, Inc. &middot; <a href="#">Privacy</a>
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
    	 <script>window.jQuery || document.write('<script src="js/jquery-1.11.3.min.js"><\/script>')</script>
	<![endif]-->
	
	<!--[if gt IE 8]><!-->
	    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	    <script>window.jQuery || document.write('<script src="js/jquery-2.1.4.min.js"><\/script>')</script>
	<!--<![endif]-->

	<script src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		var links = $('#navbar-link-container').find('a');
		//var currentHref;
		for (index = 0; index < links.length; ++index) {
		    if((links[index].getAttribute("href")) == "<?php echo $currentFile?>"){
		    	links[index].parentElement.classList.add('active');
		    	//links[index].classList.add('active');
			    }
		}
		console.log(links.length);
		
</script>
		
	<?php echo $additionalJS;?>
</body>
</html>
