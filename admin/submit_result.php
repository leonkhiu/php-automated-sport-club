<?php
require_once("layout/top.php");
$title = "Submit the Game result - $uname";
$messages[]="You can submit the game result only once!";
$messages[]="You can see all games which you are entitle to, but you can submit when the game is finished!";

$viewId= !empty($_GET['viewId']) ? (int)$_GET['viewId'] : 1;

$myTeamId = TeamUser::findTeamByUid($uid);
$noGames = false;
if($myTeamId == 0){
	$messages[]="You don't belong to any team!";
	$noGames = true;
}

require_once ("layout/htmltop.php");

if(!$noGames){
	$objects = Game::findByTeamID($myTeamId);
	$columns=array("first_team_id", "second_team_id", "date");
	echo showAll($objects, $columns, true, false, false, 0);
}

//TODO: needs to check here

$form=DFForm::findByID($viewId);
$formElements=DFUserForm::findElements($form->id);

echo "<h3>$form->title <small>$form->description</small></h3>";

#----------------------------------------Form begin
echo"<form method='post' name=\"$form->title\" class='form-horizontal'>";

foreach ($formElements as $element){
	$elementName= $element->question;
	$helpText= isset($element->help_text)? $element->help_text : "";
	$pattern = isset($element->pattern) ? $element->pattern : "";
	$required = "";
	if($element->required == 1){
		$required = "required";
	}

	$elementType=DFElement::findByID($element->element_id);
	$elementType=$elementType->type;

	$hasChild=false;
	$list = false;
	$textarea = false;

	if($element->element_id < 4){
		// It means the element_id is 1, 2 or 3
		// It means that it has got children
		// Which it means it could be lists, radio buttons or checkboxes

		$hasChild= true;
		$elementChildren= DFElementGroup::findChildren($form->id, $element->element_id);


		switch($elementType){
			case "radio":
				$labelClassName="radio-inline";
				break;
			case "checkbox":
				$labelClassName="checkbox-inline";
				break;
		}

		if($element->element_id == 3){
			// It is a list
			$list = true;
		}

	}

	if($element->element_id == 7){
		$textarea = true;
	}



	echo "<div class='form-group'>";
	echo "<label for=\"$elementName\" class=\"col-sm-4 control-label $required\">$elementName</label>";

	if($hasChild){
		if($list){
			echo "<label for=\"$elementName\" class=\"$labelClassName\"><select class='form-control' id=\"$elementName\">";
			if(!empty($helpText)){
				echo "<span class='help-block small'>$helpText</span>";
			}
		}
		foreach ($elementChildren as $elementChild){
			if($list){
				echo "<option id=\"$elementName\" value=\"$elementChild->text\" $required>$elementChild->text</option>";
			} else {
				echo "<label class=\"$labelClassName\">";
				echo "<input type=\"$elementType\" id=\"$elementName\" name=\"$elementName\" value=\"$elementChild->text\" $required> $elementChild->text";
				echo "</label>";
			}

		}
		if($list){
			echo "</select></label>";
		}
	} else{
		echo "<div class='col-md-4 col-xs-3'>";
		if($textarea){
			echo "<textarea class='form-control input-sm' rows='3' id=\"$elementName\" placeholder=\"$helpText\" $required></textarea>";
		} else {
			echo "<input type=\"$elementType\" id=\"$elementName\" class='form-control'";
			if(!empty($pattern)){
				echo " pattern=\"$pattern\"";
			}
				
			if($elementType == "number"){
				echo " min='0'";
			}
			echo " placeholder=\"$helpText\" title=\"$helpText\" $required>";
			if($elementType == "time" || $elementType == "date"){
				if(!empty($helpText)){
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
echo "<button type='submit' class='btn btn-primary'>Submit</button>";
echo "</div>";
echo "</div>";
echo "</form>";
#----------------------------------------Form end



require_once ('layout/htmlbuttom.php');;
?>