<?php
require_once('../inc/initialise.php');

$objects = DFForm::findLatest(13);
$columns = array ("title", "description", "date");
echo showAll ( $objects, $columns, false, false, false, 0);

?>