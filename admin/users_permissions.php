<?php 
require_once("layout/top.php");
$sweetAlertRequirement = true;
$title = "Users Permissions";

$allPermissions = Permission::findAll();
$myPermissions = UserPermission::findByUid($uid);

//echo (UserPermission::hasPermission($uid, 8))? "yes" : "noooo";


require_once ("layout/htmltop.php");

echo "<h4 class='text-info'>{$uname} permissions:</h4>";
echo showAll($myPermissions, ['permission_id']);


echo "<h4 class='text-info'>List of all available permissions and activies in the website:</h4>";
echo showAll($allPermissions, ['title']);

require_once ('layout/htmlbuttom.php');
?>