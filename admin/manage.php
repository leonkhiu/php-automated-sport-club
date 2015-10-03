<?php
require_once("layout/top.php");
$title = "Manage the website, $uname";
$fontAwesome = true;

$viewType = isset($_GET['type'])? $_GET['type'] : "sports";
$userLink = $currentFile. "?type=users";
$teamsLink = $currentFile. "?type=teams";
$groupsLink = $currentFile. "?type=groups";
$gamesLink = $currentFile. "?type=games";
$scoresLink = $currentFile. "?type=scores";
$tournamentLink = $currentFile. "?type=tournament";
$sportLink = $currentFile. "?type=sports";
$tabSportClass = $tabTeamsClass =$tabGroupsClass =$tabScoresClass =$tabTournamentClass = "";

switch ($viewType) {
	
	case "sports" :
		$tabSportClass = "active";
		$objects = Sport::findAll();
		$columns = array("name");
		break;
	case "teams" :
		$tabTeamsClass = "active";
		$objects = Team::findAll();
		$columns = array("name", "club_id", "date");
		break;
	case "groups" :
		$tabGroupsClass = "active";
		$objects = Groups::findAll();
		$columns = array("name", "sport_id", "tournament_id", "date");
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





require_once ('layout/htmlbuttom.php');;
?>