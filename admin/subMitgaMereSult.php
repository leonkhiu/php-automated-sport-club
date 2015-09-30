<?php
require_once ("layout/top.php");

$formId = $_POST ['formId'] ;

$game = Game::findByID($_POST ['gameId']);

if( (((int)$game->date) + 18000) < time()){

	$score->game_id =  $_POST ['gameId'] ;

	$inputElement = $_POST["inputElement"];
	$score->t1_point = $inputElement[0];
	$score->t2_point = $inputElement[1];

	$score->update_uid = $uid;
	$score->date = time();
	$score->save();
}