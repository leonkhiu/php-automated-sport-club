<?php
require_once ("layout/top.php");
//$sweetAlertRequirement = true;
$fontAwesome = true;

$title = "Submit the Game result";
$messages [] = "You can submit the game result only once!";
$messages [] = "You can see all games which you are entitle to, but you can submit when the game is finished!";
//$messages [] = "You can only submit the game result if it past 5 hours after the game.";

$formId = ! empty ( $_GET ['formId'] ) ? ( int ) $_GET ['formId'] : 0;
$gameId = ! empty ( $_GET ['gameId'] ) ? ( int ) $_GET ['gameId'] : 0;

$myTeamId = TeamUser::findTeamByUid ( $uid );
$noGames = false;
if ($myTeamId == 0) {
	$messages [] = "You don't belong to any team!";
	$noGames = true;
}

if(isset($_POST['submitResult'])){
	
	$formId = $_POST ['formId'] ;
	
	$game = Game::findByID($_POST ['gameId']);
	
	//if( (((int)$game->date) + 18000) < time()){
	if(1){
		
		$score->game_id = $gameId =  $_POST ['gameId'] ;
		
		$inputElement = $_POST["inputElement"];
		$score->t1_point = $inputElement[0];
		$score->t2_point = $inputElement[1];
		
		$score->update_uid = $uid;
		$score->date = time();
		if($score->save()){
			
			if(Score::isCorrect($gameId)){
				Game::MakeDone($gameId);
				$ajaxChecker->IncreaseById(2);
			}
			
			$messages = array();
			$messages[] = "The game result has been saved.";
		}	
	} else{
		$messages[] = "You are not allow to enter the game result before 5 hours.";
	}
	
}

/*
 echo "<pre>";
 var_dump($_POST);
 echo "</pre>";
 */
 

$additionalJSs ="
		<script>
			$(document).ready(function(){
			  $('#gameResult').on('submit',function(e) {  //Don't foget to change the id form
			  $.ajax({
			      url:'ajax/subMitgaMereSult.php', //===PHP file name====
			      data:$(this).serialize(),
			      type:'POST',
			      success:function(data){
			        console.log(data);
			        //Success Message == 'Title', 'Message body', Last one leave as it is
				    swal('¡Success!', 'Message sent!', 'success');
			      },
			      error:function(data){
			        //Error Message == 'Title', 'Message body', Last one leave as it is
				    swal('Oops...', 'Something went wrong :(', 'error');
			      }
			    });
			    e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event 'Click'
			  });
			});
			</script>
		";

require_once ("layout/htmltop.php");

if (! $noGames) {
	$objects = Game::findByTeamID ( $myTeamId );
	$columns = array (
			"first_team_id",
			"second_team_id",
			"date" 
	);
	echo showAlll ($uid, $objects, $columns, 0 );
}

if(!Score::hasUserSubmitted($uid, $gameId) && $formId > 0){

//if ($formId > 0) {
	
	$form = DFForm::findByID ( $formId );
	$formElements = DFUserForm::findElements ( $form->id );
	
	echo "<h3>$form->title <small>$form->description</small></h3>";
	
	// ----------------------------------------Form begin
	echo "<form method='post' name=\"$form->title\" class='form-horizontal' id='gameResult'>";
	
	echo "<input type='hidden' value='$gameId' name='gameId'>";
	echo "<input type='hidden' value='$formId' name='formId'>";
	
	foreach ( $formElements as $element ) {
		$elementName = $element->question;
		$helpText = isset ( $element->help_text ) ? $element->help_text : "";
		$pattern = isset ( $element->pattern ) ? $element->pattern : "";
		$required = "";
		if ($element->required == 1) {
			$required = "required";
		}
		
		$elementType = DFElement::findByID ( $element->element_id );
		$elementType = $elementType->type;
		
		$hasChild = false;
		$list = false;
		$textarea = false;
		
		if ($element->element_id < 4) {
			// It means the element_id is 1, 2 or 3
			// It means that it has got children
			// Which it means it could be lists, radio buttons or checkboxes
			
			$hasChild = true;
			$elementChildren = DFElementGroup::findChildren ( $form->id, $element->element_id );
			
			switch ($elementType) {
				case "radio" :
					$labelClassName = "radio-inline";
					break;
				case "checkbox" :
					$labelClassName = "checkbox-inline";
					break;
			}
			
			if ($element->element_id == 3) {
				// It is a list
				$list = true;
			}
		}
		
		if ($element->element_id == 7) {
			$textarea = true;
		}
		
		echo "<div class='form-group'>";
		echo "<label for=\"$elementName\" class=\"col-sm-4 control-label $required\">$elementName</label>";
		
		if ($hasChild) {
			if ($list) {
				echo "<label for=\"$elementName\" class=\"$labelClassName\"><select class='form-control' id=\"$elementName\">";
				if (! empty ( $helpText )) {
					echo "<span class='help-block small'>$helpText</span>";
				}
			}
			foreach ( $elementChildren as $elementChild ) {
				if ($list) {
					echo "<option id=\"$elementName\" value=\"$elementChild->text\" $required>$elementChild->text</option>";
				} else {
					echo "<label class=\"$labelClassName\">";
					echo "<input type=\"$elementType\" id=\"$elementName\" name=\"$elementName\" value=\"$elementChild->text\" $required> $elementChild->text";
					echo "</label>";
				}
			}
			if ($list) {
				echo "</select></label>";
			}
		} else {
			echo "<div class='col-md-4 col-xs-3'>";
			if ($textarea) {
				echo "<textarea class='form-control input-sm' rows='3' id=\"$elementName\" placeholder=\"$helpText\" $required name='paragraph[]'></textarea>";
			} else {
				echo "<input type=\"$elementType\" id=\"$elementName\" class='form-control' name='inputElement[]'";
				if (! empty ( $pattern )) {
					echo " pattern=\"$pattern\"";
				}
				
				if ($elementType == "number") {
					echo " min='0'";
				}
				echo " placeholder=\"$helpText\" title=\"$helpText\" $required>";
				if ($elementType == "time" || $elementType == "date") {
					if (! empty ( $helpText )) {
						echo "<span class='help-block small'>$helpText</span>";
					}
				}
			}
			echo "</div>";
		}
		echo "</div>";
	}
	
	echo "<div class='form-group'>";
	echo "<label class='col-sm-4 control-label'></label>";
	echo "<div class='col-md-4 col-xs-3'>";
	echo "<button type='submit' class='btn btn-success' name='submitResult'>Submit result</button>";
	echo "</div>";
	echo "</div>";
	echo "</form>";
	// ----------------------------------------Form end
}

function showAlll($uid, $objects, $columns, $startId = 1) {
	//global $uid;
	$result = "";
	$result .= '<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
        <tr>
          <th>#</th>';
	
	foreach ( $columns as $column ) {
		$content = ucfirst ( $column );
		if ($column == "first_team_id") {
			$content = "Host";
		}
		if ($column == "second_team_id") {
			$content = "Guest";
		}
		
		$result .= "<th>$content</th>";
	}
	
	$result .= "<th>Status</th>";
	$result .= "<th></th>";
	
	$result .= "
        </tr>
      </thead>
      <tbody>";
	foreach ( $objects as $object ) {
		$startId ++;
		$result .= "
		<tr >
		<td>$startId</td>";
		foreach ( $columns as $column ) {
			if ($column == "date" || $column == "last_update") {
				$content = date ( 'Y-m-d H:i:s', $object->$column );
			} elseif ($column == "first_team_id" || $column == "second_team_id") {
				$content = Team::findNameById ( $object->$column );
			} else {
				$content = $object->$column;
			}
			$result .= "<td>$content</td>";
		}

		if(Score::hasUserSubmitted($uid, $object->id)){
			$gameStatus = "<span class='text-info'><i class='fa fa-spinner fa-pulse'></i> Waiting for final decision</span>";
		} else{
			$gameStatus = "<span class='text-warning'><i class='fa fa-hourglass-half'></i> Waiting for you</span>";
		}
		
		if(Score::isCorrect($object->id)){
			Game::MakeDone($object->id);
			
			$gameStatus = "<span class='text-success'><i class='fa fa-check'></i> Done</span>";
		}
		
		$result.="<td>$gameStatus</td>";
		
		if (isset ( $object->id )) {
			$id = $object->id;
		}
		
		if(!Score::hasUserSubmitted($uid, $object->id)){
			$submitLink = currentFile () . "?gameId=". $id ."&formId=" .$object->form_id;  
			$result .= "<td><a class='btn btn-default' role='button' href='$submitLink'>Submit result</a></td>";
		}
		
		$result .= "</tr>";
	}
	
	$result .= "
      </tbody>
	</table>
</div>";
	return $result;
}

require_once ('layout/htmlbuttom.php');
;
?>