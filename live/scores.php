<?php
require_once ('../inc/initialise.php');

$sportId = (isset($_GET['sportId'])) ? (int)$_GET['sportId'] : 1;
$groupId = (isset($_GET['groupId'])) ? (int)$_GET['groupId'] : 1;

$sports = $sport->findAll();
if($sportId > 0){
	$groups = $groups->findBySportID($sportId);
}
$sportScoring = SportScoring::findBySportId($sportId);

if($groupId > 0){
	$groupTeams = $groupTeam->findBygroupID($groupId);
}

$rankingTable = array();

$teams =  $teamName = array();
foreach ($groupTeams as $team){
	$teams[] = $team->team_id;
	$teamName[] = Team::findNameById($team->team_id);
}
$rankingTable[] = $teams;
$rankingTable[] = $teamName;


$gameId = $team1_Id = $team2_Id = array();
$games = $game->findByGroupId($groupId, true);
foreach ($games as $game){
	$team1_Id[] = $game->first_team_id;
	$team2_Id[] = $game->second_team_id;
	$gameId[] = $game->id;
}

$gameResult= Score::gameResult($gameId);





echo "<pre>";
var_dump($rankingTable);
echo "</pre>";




//////////////////////////////////////////////////////output

echo "<ul class='nav nav-tabs nav-justified'>";
foreach ($sports as $sport){
	echo "<li role='presentation'";
	if($sport->id == $sportId){
		echo " class='active' ";
	}
	echo "><a href='?sportId=$sport->id'>$sport->name</a></li>";
}
echo "</ul>";
echo "<br>";
if($sportId > 0){
	echo "<ul class='nav nav-pills'>";
	foreach ($groups as $group){
		$groupLink = currentfile() . urlAddorChangeParameter('groupId', $group->id);
		echo "<li role='presentation'";
		if($group->id == $groupId){
			echo " class='active' ";
		}
		echo "><a href='$groupLink'>$group->name</a></li>";
	}
	echo "</ul>";	 
}

?>


<table class="table table-hover table-condensed">
	<thead>
		<tr>
			<th>Position</th>
			<th>Team</th>
			<th>P</th>
			<th>W</th>
			<th>D</th>
			<th>L</th>
			<th>F</th>
			<th>GD</th>
			<th>Pts</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$i = 1;
		foreach ($games as  $game){
			echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>$game->first_team_id</td>";
				echo "<td>$game->second_team_id</td>";
				echo "<td></td>";
			
			$i++;
			echo "</tr>";
		}
		?>
			
			<td>Team</td>
			<th>P</th>
			<th>W</th>
			<th>D</th>
			<th>L</th>
			<th>F</th>
			<th>GD</th>
			<th>Pts</th>
		

	</tbody>
</table>