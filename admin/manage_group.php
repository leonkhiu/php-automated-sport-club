<?php
require_once("layout/top.php");
$title = "Manage Group";
$fontAwesome = true;

$groupId = isset($_GET['groupId'])? $_GET['groupId'] : 0;

$thisGroup = Groups::findByID($groupId);
if(!$thisGroup) {
	redirectTo('index.php');
}

if(isset($_POST['save'])){
	$groupId = $_POST['groupId'];
	GroupTeam::removeByGroupId($groupId);
	$groupTeam = new GroupTeam();
	foreach($_POST['team'] as $tmpTeamId) {
		$groupTeam->id = null;
		$groupTeam->group_id = $groupId;
		$groupTeam->team_id = $tmpTeamId;
		$groupTeam->save();
	}
	$messages[] = "Changes have been saved";
}

$thisSport = Sport::findNameById($thisGroup->sport_id);
$thisTournament = Tournament::findNameById($thisGroup->tournament_id);

$teams = TeamSport::findBySportId($thisGroup->sport_id);

$teamsId = array();
$teamsInGroup = GroupTeam::findBygroupID($groupId);
foreach ($teamsInGroup as $tmpTeams){
	$teamsId[] = $tmpTeams->team_id;
}



require_once ("layout/htmltop.php");


echo "
<ol class='breadcrumb'>
  <li><a href='#'>{$thisSport}</a></li>
  <li><a href='#'>{$thisTournament}</a></li>
  <li class='active'>{$thisGroup->name}</li>
</ol>";

echo "<h3>{$thisGroup->name} <small>management</small></h3>";
echo "<h4>List of all teams related to this sport and group</h4>";
?>

<div class="col-md-6 col-md-offset-3 col-sx-6 col-sx-offset-3 col-sm-6 col-sm-offset-3">
	<form class="form-horizontal" method="POST">
<?php 
echo "<input type='hidden' name='groupId' value='{$groupId}'>";
foreach ($teams as $team){
	echo "<div class='form-group'>";
	
	echo "<input type='checkbox' name='team[]' value='{$team->teamId}'";
	if(in_array($team->teamId, $teamsId)){
		echo " checked";
	}
	echo ">". Team::findNameById($team->teamId) . "<br>";
	echo "</div>";
	//echo Team::findNameById($team->teamId)
}
?>

		<div class="form-group">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary center-block" name="save">Save</button>
			</div>
		</div>
	</form>
</div>

<?php require_once ('layout/htmlbuttom.php');;
?>