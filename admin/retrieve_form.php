<?php
require_once("layout/top.php");
$sweetAlertRequirement = true;
$paginationRequirement = true;

//pagination variable preparation
$page= !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage=13;
$visibalePage = 5; // in pagination
$total=DFForm::countAll();

$totalPages = (round($total/$perPage) == 1)? 0 : round($total/$perPage);
$pagination = new pagination($page, $perPage , $total);

$formId= !empty($_GET['formId']) ? (int)$_GET['formId'] : null;
$formId= !empty($_GET['viewId']) ? (int)$_GET['viewId'] : null;

$delFormId = !empty($_GET['delId']) ? (int)$_GET['delId'] : null;
if(isset($delFormId)){
	//TODO:: check it before delete, user permission
	//check with form token for more security
	$dFForm->id = $delFormId;
	
	DFElementGroup::removebyFormId($delFormId);
	if(DFUserForm::removebyFormId($delFormId)){
		if($dFForm->delete()){
			$messages[] = "The form has been deleted! :(";
			systemLog($uid, "Remove a from with ID=".$delFormId);
		}
	}
}

$title = "Retrieve Forms";

$additionalJS .="
		<script>
		   $('#pagination').twbsPagination({
        	totalPages: $totalPages,
        	visiblePages: $visibalePage,
			href: 'retrieve_form.php?page={{number}}'        	
    	});
		</script>
		";

require_once ("layout/htmltop.php");

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
$startId=(($page-1) * $perPage) + 1;
echo showAll ( $objects, $columns, true, false, true, $startId);
echo "<div class='text-center'><ul id='pagination' class='agination-sm '></ul></div>";

if(isset($formId)){
	echo showForm($formId);
}
require_once ('layout/htmlbuttom.php');


?>