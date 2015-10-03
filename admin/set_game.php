<?php
require_once("layout/top.php");
$sweetAlertRequirement = true;
$title = "New game $uname";


$sports = Sport::findAll();
$tournaments = Tournament::findAll();

//$additionalJS .='<script src="../js/sport-club.js"></script>';
$additionalJS .="
		<script>
			function getGroups(sportId, tournamentId) {
				$.ajax({
				type: 'POST',
				url: 'ajax/get_group.php',
				data: {'sportId':sportId, 'tournamentId': tournamentId},
				success: function(data){
					$('#group-list').html(data);
				}
				});
			}
</script>
		
		
		";

require_once ("layout/htmltop.php");

?>
<div class="frmDronpDown">
	<div class="row">
		<label>Sport:</label><br/>
		<select name="sport" class="form-control" id="sport" onChange="showMe('tournaments')">
		<option value="">Select Sport</option>
		<?php
		foreach($sports as $sport) {
		?>
		<option value="<?php echo $sport->id; ?>"><?php echo $sport->name; ?></option>
		<?php
		}
		?>
		</select>
	</div>
	
	<div class="row">
		<label>Tournament:</label><br/>
		<select name="tournament"  class="form-control" id="tournaments" onChange="getGroups(sport.value,this.value);">
		<option value="">Select Tournament</option>
		<?php
		foreach($tournaments as $tournament) {
		?>
		<option value="<?php echo $tournament->id; ?>"><?php echo $tournament->name; ?></option>
		<?php
		}
		?>
		</select>
	</div>
	
	<div class="row">
		<label>Group:</label><br/>
		<select name="group" id="group-list" class="form-control">
		<option value="">Select Group</option>
		</select>
	</div>
	
	
</div>



<?php require_once ('layout/htmlbuttom.php'); ?>