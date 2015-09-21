<?php
require_once '../inc/initialise.php';
$uid= 1;
$uname = "MoHo";

//pagination variable preparation
$page= !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage=13;
$visibalePage = 5; // in pagination
$total=DFForm::countAll();

$totalPages = (round($total/$perPage) == 1)? 0 : round($total/$perPage);
$pagination = new pagination($page, $perPage , $total);

$formId= !empty($_GET['formId']) ? (int)$_GET['formId'] : 1;
$viewId= !empty($_GET['viewId']) ? (int)$_GET['viewId'] : 1;


$title = "Retrieve Forms-$uname";
$confirmJqueryUICSS= '<link rel="stylesheet" href="../css/jquery-ui.css" />';
$confirmJqueryUIJS ='<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>';
$confirmJqueryUIJS.='<script>window.jQuery || document.write(\'<script src="../js/jquery-ui.min.js"><\/script>\')</script>';
$confirmJqueryUIJS.='<script src="../js/jquery.easy-confirm-dialog.min.js"></script>';
$confirmJqueryUIJS.='
					<script>
						$(".delConfirm").easyconfirm();
					</script>
					';
$additionalCss = $confirmJqueryUICSS;
$additionalJS = $confirmJqueryUIJS;

$additionalJS .= '<script src="../js/jquery.twbsPagination.min.js"></script>';
//$additionalJS .= '<script src="../js/sport-club.js"></script>';
$additionalJS.="
		<script>
		   $('#pagination').twbsPagination({
        	totalPages: $totalPages,
        	visiblePages: $visibalePage,
			href: 'retrieve_form.php?page={{number}}'        	
    	});
		</script>
		";

require_once ("../page/admintop.php");

/*********************Content******************************/
//echo "<h5>To view a form, add e.g. '?formId=1' to end of URL <small>Will be fixed very soon</small></h5>";

$objects = DFForm::findAllPagination ( $perPage, $pagination->offset () );
// required columns to show in tables, they MUST be similar to DB fields
$columns = array (
		"uid",
		"title",
		"description",
		"date" 
);
$startId=($page-1) * $perPage;
echo showAll ( $objects, $columns, true, true, true, $startId);
echo "<div class='text-center'><ul id='pagination' class='agination-sm '></ul></div>";

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


require_once ('../page/adminbuttom.php');
?>