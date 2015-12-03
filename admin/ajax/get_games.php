<?php
require_once '../../inc/initialise.php';

if(!empty($_POST["groupId"])) {	
	$groupId= (int)$_POST["groupId"];
	$games = Game::findByGroupId($groupId);
	
	$columns= array('first_team_id', 'second_team_id', 'date', 'done');
	
	echo showAll($games, $columns, false, false, false, 1);
} else {
	echo "Something is wrong";
}
?>