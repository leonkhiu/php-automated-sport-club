<?php
require_once("layout/top.php");
$title = "Manage Group";
$fontAwesome = true;

$groupId = isset($_GET['groupId'])? $_GET['groupId'] : 0;

$thisGroup = Groups::findByID($groupId);
if(!$thisGroup) {
	redirectTo('index.php');
}

$thisSport = Sport::findNameById($thisGroup->sport_id);
$thisTournament = Tournament::findNameById($thisGroup->tournament_id);

$teams = TeamSport::findBySportId($thisGroup->sport_id);

require_once ("layout/htmltop.php");
echo "
<ol class='breadcrumb'>
  <li><a href='#'>{$thisSport}</a></li>
  <li><a href='#'>{$thisTournament}</a></li>
  <li class='active'>{$thisGroup->name}</li>
</ol>";

echo "<h3>Manage <small>{$thisGroup->name}</small></h3>";
foreach ($teams as $team){
	echo "<input type='checkbox'>". Team::findNameById($team->teamId) . "<br>";
	//echo Team::findNameById($team->teamId)
}


require_once ('layout/htmlbuttom.php');;
?>