<?php
require_once("layout/top.php");
$sweetAlertRequirement = true;
$title = "Automatic Events";

$sports = Sport::findAll();
$tournaments = Tournament::findAll();

//echo Game::hasGameBeenSet(1,	2)?  "yes" : "Noooo";

if(isset($_POST['submitGame'])){
	
	/*$team1Id = $game->first_team_id = $_POST['team1'];
	$team2Id = $game->second_team_id = $_POST['team2'];

	$gameTime = $_POST['gameTime']; // 02:01
	$gameDate = $_POST['gameDate']; // => 2015-10-30
	$game->date = (int)strtotime($gameDate ." ". $gameTime);

	if($game->save()){
		$messages[] = "New game has been set between following teams:";
		$messages[] = "<b>" . Team::findNameById($team1Id) . "</b> (Host) vs. <b>". Team::findNameById($team2Id)."</b> (Guest)";
		$messages[] = "On ". $gameDate . " at " . $gameTime;
	}
	*/
	
	$game->update_uid = $uid;
	$game->done = 0;
	$game->group_id = (int)$_POST['groupId'];
	$game->form_id = $_POST['gameForm'];
	$allTeams = GroupTeam::findBygroupID((int)$_POST['groupId']);
	$teams = array();
	foreach ($allTeams as $teamOne){
		foreach ($allTeams as $teamTwo){
			if($teamOne->team_id == $teamTwo->team_id){
				continue;
			}
			$teams[] = array($teamOne->team_id, $teamTwo->team_id);
			//echo $teamOne->team_id . " ==> " .$teamTwo->team_id ."<br>";
		}
	}
	
	
	#Temp calculation
	$i = 1;
	foreach ($teams as $inGame){
		$team1Id = $game->first_team_id =$inGame[0];
		$team2Id = $game->second_team_id = $inGame[1];
		$game->date = (int)strtotime("+$i day");
		$i+=2;
		
		/*if(Game::hasBeenSet($team1Id, $team2Id)){
			continue;
		}
		*/
		if($game->save()){
			$messages = array();
			$messages[] = "All games in this group have been set";			
		}
	}

	
	
	/*
	$teamGames = array();
	for($i=0; $i<sizeof($allTeams); $i++){
		$weeks = array();
		$j = 0;
		foreach ($teams as $perTmpTeam2){
			if($allTeams[$i]->team_id == $perTmpTeam2[0] || $allTeams[$i]->team_id == $perTmpTeam2[1] ){
				$weeks[] = $j;
			}
			$j++;
				
		}
		$teamGames[] = $weeks;
	}
	for($i=0; $i<sizeof($teamGames); $i++){
		for ($j=0; $j<sizeof($teamGames[$i]); $j++){
			
		}
		$teams[$teamGames[$i][$j]];
		$allTeams[$i]->team_id;
	}
	showRawArray($teamGames);
	
	*/
	/*
	//echo sizeof($allTeams);
	$usedIndex= array();
	$tmpArray = array();
	//shuffle($teams);
	$i=0;
	if(($teams[$i][0] != $teams[$i+1][0] || $teams[$i][0] != $teams[$i+1][1]) && (($teams[$i][1] != $teams[$i+1][0] || $teams[$i][1] != $teams[$i+1][1]))){
		//echo "they are equal";
	}
		
	
	for ($j=1; $j<sizeof($allTeams); $j++){
		for($i=0; $i<sizeof($teams); $i++){
			
			if( ($teams[$i][0] != $teams[$i+1][0] || $teams[$i][0] != $teams[$i+1][1]) && ($teams[$i][1] != $teams[$i+1][0] || $teams[$i][1] != $teams[$i+1][1]) ){
				echo "Index $i is equal to index". $i+1 . "<br>";
			}
			
			
			
			if($i>0){
				$team1 = $teams[$i-1][0];
				$team2 = $teams[$i-1][1];
			} else {
				$tmpArray[] = $teams[$i];
				$usedIndex[] = $i;
				continue;
			}
			if(!in_array($i, $usedIndex)){
				
				if(($team1 != $teams[$i][0] || $team1 != $teams[$i][1]) && ($team2 != $teams[$i][0] || $team2 != $teams[$i][1])){
					$tmpArray[] = $teams[$i];
					$usedIndex[] = $i;
				}
			}
		}
	}
	*/
	//shuffle($teams);
	//showRawArray($teams);
	
	
	
	
}

$additionalJS .='<script src="../js/new_game.js"></script>';
require_once ("layout/htmltop.php");
?>

<div class="col-md-4 col-md-offset-4 col-sx-4 col-sx-offset-4 col-sm-4 col-sm-offset-4">
	<div class="row">
		<label for="sport" class="col-sm-2 control-label">Sport</label>
		<select	name="sport" class="form-control" id="sport" onChange="showMe('tournaments', 'row'); getForms(this.value);">
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

	<div class="row hidden" id="tournaments">
		<label for="tournament" class="col-sm-2 control-label">Tournament:</label>
		<select name="tournament" id="tournament" class="form-control" onChange="showMe('groupList','row'); getGroups(sport.value,this.value);">
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

	<div class="row hidden" id="groupList">
		<label for="group" class="col-sm-2 control-label">Group:</label>
		<select name="group" class="form-control" id="group" onChange="showMe('newGameSubmit',''); getTeams(this.value); getValue('group','groupId');">
			<option value="">Select Group</option>
		</select>
	</div>

</div>

<div class="hidden" id="newGameSubmit">

<form class="col-md-4 col-md-offset-4 col-sx-4 col-sx-offset-4 col-sm-4 col-sm-offset-4" method="POST">

<input type="hidden" name="groupId" id="groupId">

<div class="form-group">
	<label for="gameForm" class="control-label">Choose a form: </label>
	 <select name="gameForm" class="form-control" id="gameForm" required="required" onChange="showMe('allGames',''); getGames(group.value);">
		<option value="">Select Form</option>
	</select> 
</div>

<?php 
echo moreSpace();
echo moreSpace();
?>

<div class="form-group">
<input type="submit" name="submitGame" value="Set all Events in the group" class="btn btn-info"> 
</div>	
</form>
</div>

<div class="clearfix"></div>
<div class="hidden" id="allGames">

</div>
<?php require_once ('layout/htmlbuttom.php'); ?>