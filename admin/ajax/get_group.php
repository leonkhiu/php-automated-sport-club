<?php
require_once '../../inc/initialise.php';
if(!empty($_POST["sportId"]) && !empty($_POST["tournamentId"])) {
	
	$sportId= (int)$_POST["sportId"];
	$tournamentId = (int)$_POST["tournamentId"];
	
	$groups = Groups::findBySportIdTournamentId($sportId, $tournamentId);
?>
	<option value="">Select Group</option>
<?php
	foreach($groups as $group) {
?>
	<option value="<?php echo $group->id; ?>"><?php echo $group->name; ?></option>
<?php
	}
}
?>