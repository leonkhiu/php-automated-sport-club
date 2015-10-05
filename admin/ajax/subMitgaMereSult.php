<?php
require_once ("layout/top.php");

$formId = $_POST ['formId'] ;

$game = Game::findByID($_POST ['gameId']);

//at least 5 hours after the game
if( (((int)$game->date) + 18000) < time()){

	$score->game_id = $gameId =  $_POST ['gameId'] ;

	$inputElement = $_POST["inputElement"];
	$score->t1_point = $inputElement[0];
	$score->t2_point = $inputElement[1];

	$score->update_uid = $uid;
	$score->date = time();
	$score->save();
	
	
	if(Score::isCorrect($gameId)){
		Game::MakeDone($gameId);
		$ajaxChecker->IncreaseById(2);
	}
	
}