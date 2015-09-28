<?php
require_once 'inc/initialise.php';

$start = $ajaxChecker->checkCounter(1);

$title = "Live";
$additionalCss = '';
$additionalJS = '<script src="js/prototype.js"></script>';
$additionalJS.= '<script src="js/sport-club.js"></script>';
$additionalJS.="
		<script>
			//Every half minute call a function check
			setInterval(\"checkCounter('ajax/livescore.php',$('old_count'),$('new_count'));\",10000); 
			// When the page is loading we set the initial counter value
			window.onload=function(){
  				$('old_count').update('$start');
			}
		</script>
		";
require_once ("page/publictop.php");

?>

<div class="container">
	<div class="row">
	<p id="old_count" class="hide"><?php echo $start; ?></p>
	<p id="new_count" class="hide"></p>	
	<div id="updateMe"></div>
	
	</div>
</div>
<?php
require_once ("page/publicbuttom.php");
?>	