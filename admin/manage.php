<?php
require_once("layout/top.php");
$title = "Manage the website";
$fontAwesome = true;

$viewType = isset($_GET['type'])? $_GET['type'] : "sport";
$userLink = $currentFile. "?type=users";
$teamsLink = $currentFile. "?type=teams";
$groupsLink = $currentFile. "?type=group";
$gamesLink = $currentFile. "?type=games";
$scoresLink = $currentFile. "?type=scores";
$tournamentLink = $currentFile. "?type=tournament";
$sportLink = $currentFile. "?type=sport";
$tabSportClass = $tabTeamsClass =$tabGroupsClass =$tabScoresClass =$tabTournamentClass = "";
$createNew = false;

switch ($viewType) {
	
	case "sport" :
		$tabSportClass = "active";
		$objects = Sport::findAll();
		$columns = array("name");
		$createNew = true;
		break;
	case "teams" :
		$tabTeamsClass = "active";
		$objects = Team::findAll();
		$columns = array("name", "club_id", "date");
		break;
	case "group" :
		$tabGroupsClass = "active";
		$objects = Groups::findAll();
		$columns = array("name", "sport_id", "tournament_id", "date");
		$createNew = true;
		break;
	case "scores" :
		$tabScoresClass = "active";
		$objects = SportScoring::findAll();
		$columns = array("sport_id", "win", "draw", "loss");
		break;
	case "tournament" :
		$tabTournamentClass = "active";
		$objects = Tournament::findAll();
		$columns = array("name", "date");
		$createNew = true;
		break;
}


require_once ("layout/htmltop.php");

echo "<ul class='nav nav-tabs'>";
echo "<li role='presentation' class='$tabSportClass'><a href='$sportLink'><i class='fa fa-futbol-o fa-lg'></i>&nbsp; Sports</a></li>";
echo "<li role='presentation' class='$tabGroupsClass'><a href='$groupsLink'><i class='fa fa-users fa-lg'></i>&nbsp; Groups</a></li>";
echo "<li role='presentation' class='$tabTeamsClass'><a href='$teamsLink'><i class='fa fa-male fa-lg'></i>&nbsp; Teams</a></li>";
//echo "<li role='presentation' class='$tabUserClass'><a href='$userLink'><i class='fa fa-user fa-lg'></i>&nbsp; Users</a></li>";
//echo "<li role='presentation' class='$tabGamesClass'><a href='$gamesLink'><i class='fa fa-gamepad fa-lg'></i>&nbsp; Games</a></li>";
echo "<li role='presentation' class='$tabScoresClass'><a href='$scoresLink'><i class='fa fa-sort-numeric-asc fa-lg'></i>&nbsp; Scores</a></li>";
echo "<li role='presentation' class='$tabTournamentClass'><a href='$tournamentLink'><i class='fa fa-bitbucket fa-lg'></i>&nbsp; Tournoments</a></li>";
echo "</ul>";

echo moreSpace();

echo showAll($objects, $columns, false, false,false, 1);

if($createNew){
	$link = "new.php?type=".$viewType;
	echo "<a class='btn btn-default btn-lg' role='button' href='$link'>
				<span class='glyphicon glyphicon-plus' aria-hidden='true'></span>
				New</a>";
}




require_once ('layout/htmlbuttom.php');;
?>