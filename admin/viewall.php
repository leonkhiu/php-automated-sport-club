<?php
require_once("layout/top.php");
$sweetAlertRequirement = true;
$paginationRequirement = true;

$viewType = isset($_GET['type'])? $_GET['type'] : "log";
$logLink  = $currentFile. "?type=log";
$userLink = $currentFile. "?type=user";
$tabLogClass = $tabUserClass ="";

//pagination variable preparation
$page= !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage=10;
$visibalePage = 5; // in pagination
switch ($viewType){
	case "user":
		$total=USER::countAll();
		$tabUserClass="active";
		break;
	case "log":
		$total=SystemLog::countAll();
		$tabLogClass="active";
		break;
}

$totalPages = (round($total/$perPage) == 1)? 0 : round($total/$perPage);
$pagination = new pagination($page, $perPage , $total);

$title = "Administrator-Home-Welcome $uname";
/*
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
*/



$additionalJS.= '<script src="../js/sport-club.js"></script>';
$additionalJS.="
		<script>
		   $('#pagination').twbsPagination({
        	totalPages: $totalPages,
        	visiblePages: $visibalePage,
        	href: 'viewall.php?type=$viewType&page={{number}}'
    	});
		</script>
		";
		
require_once ("layout/htmltop.php");

/*********************Content******************************/

echo "<ul class='nav nav-tabs'>";
  echo "<li role='presentation' class='$tabLogClass'><a href='$logLink'>System Log</a></li>";
  echo "<li role='presentation' class='$tabUserClass'><a href='$userLink'>Users</a></li>";
  echo "<li role='presentation' class=''><a href=''>More</a></li>";
  echo "<li role='presentation' class=''><a href=''>More</a></li>";
  echo "<li role='presentation' class=''><a href=''>More</a></li>";
  echo "<li role='presentation' class=''><a href=''>More</a></li>";
  echo "<li role='presentation' class=''><a href=''>More</a></li>";
  echo "<li role='presentation' class=''><a href=''>More</a></li>";
  echo "<li role='presentation' class=''><a href=''>More</a></li>";
echo "</ul>";

echo moreSpace();

$startId=($page-1) * $perPage;
switch ($viewType) {
	case "user" :
		$objects = User::findAllPagination($perPage, $pagination->offset());
		$columns=array("username", "active", "fname", "lname", "date");
		$result = showAll($objects, $columns, false, true, true, $startId);
		break;
	case "log":
		$objects = SysLog::findAllPagination($perPage, $pagination->offset());
		$columns=array("username", "message", "date");
		$result = showAll($objects, $columns, false, false, false, $startId);
		break;
}


echo $result;
echo "<div class='text-center'><ul id='pagination' class='agination-sm '></ul></div>";
require_once ('layout/htmlbuttom.php');
?>