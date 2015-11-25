<?php
require_once("layout/top.php");
$sweetAlertRequirement = true;
$title = "New game";

$sports = Sport::findAll();
$tournaments = Tournament::findAll();

$messages[] = "If there is no team to choose as the second team, It means the first team has done all its game as <i>host</i>";

if(isset($_POST['submitGame'])){
	$game->update_uid = $uid;
	$game->done = 0;
	$game->group_id = $_POST['groupId'];
	$game->form_id = $_POST['gameForm'];
	$team1Id = $game->first_team_id = $_POST['team1'];
	$team2Id = $game->second_team_id = $_POST['team2'];

	$gameTime = $_POST['gameTime']; // 02:01
	$gameDate = $_POST['gameDate']; // => 2015-10-30
	$game->date = (int)strtotime($gameDate ." ". $gameTime);

	if($game->save()){
		$messages[] = "New game has been set between following teams:";
		$messages[] = "<b>" . Team::findNameById($team1Id) . "</b> (Host) vs. <b>". Team::findNameById($team2Id)."</b> (Guest)";
		$messages[] = "On ". $gameDate . " at " . $gameTime;
	}
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

<div class="clearfix"></div>

<div class="hidden" id="newGameSubmit">
<hr>
<form class="col-md-4 col-md-offset-4 col-sx-4 col-sx-offset-4 col-sm-4 col-sm-offset-4" method="POST">

<input type="hidden" name="groupId" id="groupId">

<div class="form-group">
	<label for="gameForm" class="control-label">Choose a form: </label>
	 <select name="gameForm" class="form-control" id="gameForm" required="required">
		<option value="">Select Form</option>
	</select> 
</div>

<div class="form-group">	
	<label for="team1" class="control-label">First team(Host): </label>
	<select name="team1" class="form-control" id="team1" onChange="getTeams2(group.value, this.value);" required="required">
	</select>
</div>

<div class="form-group">	
	<label for="team2" class="control-label">Second team(Guest): </label>
	<select name="team2" class="form-control" id="team2" required="required">
	<option value="">First Select the first team</option>
	</select>
</div>

<div class="form-group">	
	<label for="gameDate" class="control-label">Date:</label>
	<input type="date" name="gameDate" id="gameDate" min="<?php echo date("Y-m-d");?>" required="required" class="form-control">
</div>

<div class="form-group">	
	<label for="gameTime" class="control-label">Time:</label>	
	<input type="time" name="gameTime" id="gameTime" required="required" class="form-control">
</div>

<div class="form-group">
<input type="submit" name="submitGame" value="Submit the Game" class="btn btn-primary"> 
</div>	
</form>
</div>

<?php require_once ('layout/htmlbuttom.php'); ?>