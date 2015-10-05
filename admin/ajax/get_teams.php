<?php
require_once '../../inc/initialise.php';
$team1=false;
if(!empty($_POST["team1Id"])) {
	$team1Id = (int)$_POST['team1Id'];
	$team1 = true;
	
	$againstTeamId[] = array();
	//In knockout tournament
	/*
	$TeamGames = Game::findByTeamID($team1Id);
	foreach ($TeamGames as $eachGame){
		$againstTeamId[] = $eachGame->second_team_id;
		$againstTeamId[] = $eachGame->first_team_id;
	}
	*/
	
	//In group tournament
	$TeamGames = Game::findByFirstTeamID($team1Id);
	$gamesId = array();
	foreach ($TeamGames as $eachGame){
		$againstTeamId[] = $eachGame->second_team_id;
	}
	
	
}
if(!empty($_POST["groupId"])) {	
	$groupId= (int)$_POST["groupId"];
	$teams = GroupTeam::findBygroupID($groupId);	
?>
	<option value="">Select Team</option>
<?php
	foreach($teams as $team) {
		if($team1 && $team->team_id == $team1Id){
			continue;
		}
		
		if($team1 && in_array($team->team_id, $againstTeamId)) {
    		continue;
		}
?>
	<option value="<?php echo $team->team_id; ?>"><?php echo Team::findNameById($team->team_id); ?></option>
<?php
	}
}
?>