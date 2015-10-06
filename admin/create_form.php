<?php
require_once("layout/top.php");
$jQueryUI = true;

$newForm = false;
$newForm = isset($_POST['newForm'])? true : false;

$stepOne = $stepTwo = $stepThree = false;

$title = "Create a new form-$uname";
$additionalJS .= '<script src="../js/newform.js" type="text/javascript"></script>';
$additionalJS .= '<script src="../js/darg-drop.js" type="text/javascript"></script>';

$additionalJS .="<script>
	jQuery('a[href^=\"#form-maker\"]').click(function(e) { 
    	jQuery('html,body').animate({ scrollTop: jQuery(this.hash).offset().top}, 1000); 
    	return false; 
    	e.preventDefault();
 
	});
	</script>";
	
//echo "<h2>View all...</h2>";

/* Element static ID
 * 1: radio
 * 2: checkbox
 * 3: option // need to be done
 * 4: date
 * 5: time
 * 6: text
 * 7: paragraph
 * 8: Number
 */
/* 
echo "<pre>";
var_dump($_POST);
echo "</pre>";
*/


if ($newForm) {

	$dFForm->title = $_POST ["fromTitle"];
	$dFForm->description = $_POST ["formDescription"];
	$dFForm->sport_id = $_POST["formSport"];
	$dFForm->date = time ();
	$dFForm->token = formToken ();
	$dFForm->uid = $uid;
	
	if ($dFForm->save ()) {
		$formID = $mydb->LastInsertedId ();
		systemLog($uid, "Create a from with ID=".$formID);
		#use for live score
		$ajaxChecker->IncreaseById(1);
		
		$stepOne = true;
	}
	
	if ($stepOne) {
		
		$questions 			= $_POST ["questionElement"];
		$helpTexts			= $_POST ["helpElement"];
		$patterns 			= @$_POST ["patternRegex"];
		$requiredFieldsID	= $_POST ["requiredFieldID"];
		$questionsType		= $_POST ['questionType'];
		//$orders				= $_POST ['elementOrder'];
		
		for($i = 0; $i < count ( $questions ); $i ++) {
			$requiredFieldName = "requiredField" . $requiredFieldsID [$i];
			
			$required = ($_POST [$requiredFieldName] == 1) ? 1 : 0;
			
			switch ($questionsType [$i]) {
				
				case "radio" :
					$elementID = 1;
					break;
				
				case "checkbox" :
					$elementID = 2;
					break;
				
				case "option" :
					$elementID = 3;
					break;
				
				case "date" :
					$elementID = 4;
					break;
				
				case "time" :
					$elementID = 5;
					break;
				
				case "text" :
					$elementID = 6;
					break;
				
				case "paragraph" :
					$elementID = 7;
					break;
				
				case "number" :
					$elementID = 8;
					break;
				
				default :
					$elementID = 6;
					break;
			}
			
			$dFUserForm->form_id 	   = $formID;
			$dFUserForm->question 	   = $questions [$i];
			$dFUserForm->help_text 	   = $helpTexts [$i];
			$dFUserForm->pattern	   = @$patterns[$i];
			$dFUserForm->element_id	   = $elementID;
			$dFUserForm->required	   = $required;
			$dFUserForm->element_order = $i;
			
			if ($dFUserForm->save ()) {
				$stepTwo = true;
			}
			
			if ($elementID < 4 && $stepTwo) {
				
				$multiOptionsFieldName = "multiOption_" . $requiredFieldsID [$i];					
				$multiOptions = $_POST [$multiOptionsFieldName];
				
				for($j = 0; $j < count ( $multiOptions ); $j ++) {
				
					$dFElementGroup->form_id   = $formID;
					$dFElementGroup->parent_id = $elementID;
					$dFElementGroup->text 	   = $multiOptions [$j];
					$dFElementGroup->save();
				}
			}
		} 
	}// end of $stepOne
}
require_once ("layout/htmltop.php");
/*********************Content******************************/


?>

<form action="#" method="post" id="mainform" class="form-horizontal">

	<div class="form-group form-group-lg">
		<label class="col-sm-4 control-label" for="fromTitle">Title</label>
		<div class="col-md-4 col-xs-3">
			<input type="text" class="form-control" name="fromTitle"
				id="fromTitle" placeholder="Form title here" required>
		</div>
	</div>

	<div class="form-group last-group">
		<label class="col-sm-4 control-label" for="formDescription">Description</label>
		<div class="col-md-4 col-xs-3">
			<input type="text" class="form-control" name="formDescription"
				id="formDescription" placeholder="Describe the form in a sentence.">
		</div>
	</div>
	
	<div class="form-group last-group">
		<label class="col-sm-4 control-label" for="formSport">Sport</label>
		<div class="col-md-4 col-xs-3">
			<select class="form-control" name="formSport" id="formSport">
				<?php 
					$sports = Sport::findAll();
					foreach ($sports as $sport){
						echo "<option value='$sport->id'>$sport->name</option>";
					}
				?>
				<option value="0">General use</option>	
			</select>
		</div>
	</div>


	<span id="myForm" class="droppable"> <!-- Elements will be here --> </span>


	<p class="text-center invisible" id="form-submit">
		<input type="submit" value="submit" class="btn btn-primary"
			name="newForm" />
	</p>
</form>


<div id="form-maker" class="alert alert-info">
	<a onclick="formElement('text')" href="#form-maker" class="btn btn-success">Text</a>
	<a onclick="formElement('paragraph')" href="#form-maker" class="btn btn-success">Paragraph text</a>
	<a onclick="formElement('number')" href="#form-maker" class="btn btn-success">Number</a>
	<a onclick="multipleChoice('checkbox')" href="#form-maker" class="btn btn-success">Checkboxes</a>
	<a onclick="multipleChoice('radio')" href="#form-maker" class="btn btn-success">Multiple choice</a>
	<a onclick="formElement('time')" href="#form-maker"	class="btn btn-success">Time</a>
	<a onclick="formElement('date')" href="#form-maker" class="btn btn-success">Date</a>
	<a onclick="resetElements()" class="btn btn-danger">Reset</a>
</div>

<div class="panel-group" id="accordion" role="tablist"
	aria-multiselectable="true">
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingThree">
			<h4 class="panel-title">
				<a class="collapsed" role="button" data-toggle="collapse"
					data-parent="#accordion" href="#collapseMe" aria-expanded="false"
					aria-controls="collapseThree"> Click on me if you need help to create a form...</a>
			</h4>
		</div>
		<div id="collapseMe" class="panel-collapse collapse" role="tabpanel"
			aria-labelledby="headingThree">
			<div class="panel-body">
				<p>Some help about available element will be here soon...</p>
			</div>
		</div>
	</div>
</div>

<?php 
require_once ('layout/htmlbuttom.php');
?>