</div><!--/.col-xs-6.col-lg-12-->
</div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
		  <p class="text-primary"><strong>Dynamic Forms</strong></p>
          <div class="list-group">
            <a href="create_form.php" class="list-group-item">New form</a>
            <a href="retrieve_form.php" class="list-group-item">Retrieve Forms</a>
          </div>
          <p class="text-primary"><strong>Sections</strong></p>
          <div class="list-group">
            <a href="manage.php" class="list-group-item">View All</a>
            <!-- <a href="manage_group.php" class="list-group-item">Group</a> -->
          </div>
          <p class="text-primary"><strong>Games</strong></p>
          <div class="list-group">
            <a href="set_game_auto.php" class="list-group-item">Authomatic Event</a>
            <a href="set_game.php" class="list-group-item">New Event(Manual)</a>
            <a href="submit_result.php" class="list-group-item">Submit result</a>
          </div>
          <p class="text-primary"><strong>Website Administrator</strong></p>
          <div class="list-group">
             <a href="viewall.php" class="list-group-item">Website Admin</a>
            <a href="users_permissions.php" class="list-group-item">Permissions</a>
          </div>
          
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; <?php echo WEBSITE_TITLE. ' '. date("Y", time()); ?></p>
      </footer>

    </div><!--/.container-->
 
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
	<?php 
	if($sweetAlertRequirement){
		echo '<script src="../js/sweetalert.min.js"></script>';
	}
	
	if($paginationRequirement){
		echo '<script src="../js/jquery.twbsPagination.min.js"></script>';
	}
	if($jQueryUI){
		echo '<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>';
		echo '<script>window.jQuery || document.write(\'<script src="../js/jquery-ui.min.js"><\/script>\')</script>';
	}
	if(!empty($additionalJS)){
		echo $additionalJS;
	}
	?>
	<script src="../js/sport-club.js"></script>
	
	<!-- Sidebar nav active link -->
	<script type="text/javascript">
		var links = $('#sidebar').find('a');
		//var currentHref
		for (index = 0; index < links.length; ++index) {
		    if((links[index].getAttribute("href")) == "<?php echo $currentFile?>"){
		    	links[index].classList.add('active');	
			    }		    
		}
	</script>
</body>
</html>
