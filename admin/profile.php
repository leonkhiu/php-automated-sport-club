<?php
require_once("layout/top.php");
$sweetAlertRequirement = true;
$title = "Administrator-Home-Welcome $uname";


require_once ("layout/htmltop.php");

echo "<h3>". ucfirst($thisUser->fname) ." <small>profile</small></h3><hr>";
echo "Not completed...";


require_once ('layout/htmlbuttom.php');
?>