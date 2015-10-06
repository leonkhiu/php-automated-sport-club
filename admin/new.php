<?php
require_once ("layout/top.php");
$type = ! empty ( $_GET ['type'] ) ? $_GET ['type'] : null;

if(!isset($type)){ redirectTo("index.php"); }
$title = "New $type";

switch ($type){

	case 'user' :
	$elements = array(
		array('type' => 'text', 'name' => 'username', 'label'=>'Username', 'placeholder' => 'Username'),
		array('type' => 'text', 'name' => 'fname', 'label'=>'First name', 'placeholder' => 'First Name'),
		array('type' => 'text', 'name' => 'lname', 'label'=>'Last name', 'placeholder' => 'Last Name'),
		array('type' => 'password', 'name' => 'hashpassword', 'label'=>'Password', 'placeholder' => 'Password')
	);
	break;
	
	case 'sport' :
		$elements = array(
		array('type' => 'text', 'name' => 'name', 'label'=>'Sport name', 'placeholder' => 'e.g. football, chess')
		);
		break;
	case 'tournament' :
		$elements = array(
		array('type' => 'text', 'name' => 'name', 'label'=>'Tournament name', 'placeholder' => 'e.g. Group, Playoff')
		);
		break;
		
}

//submit the form
if(isset($_POST['save'])){
	$formType = $_POST['new-what'];
	foreach ($elements as $element){
		if($element['name'] == 'hashpassword'){
			$$formType->$element['name'] = makeHash($_POST[$element['name']]);
		} else{
			$$formType->$element['name'] = trim($_POST[$element['name']]);
		}
	}
	
	$$formType->date = time();
	
	switch ($formType){
	
		case 'user' :
			$user->active = 1;			
			break;
			
		case 'sport':
			$sport->update_uid = $uid;
			$sport->permission_id = 0;
			break;
			
		case 'tournament':
			$tournament->update_uid = $uid;
			break;
			
			
			
	}
	
	if($$formType->save()){
		$messages[] = "New $formType has been saved";
	}
}

require_once ("layout/htmltop.php");
/**************************************************/

?>

<div class="col-md-6 col-md-offset-3 col-sx-6 col-sx-offset-3 col-sm-6 col-sm-offset-3">
	<form class="form-horizontal" method="POST">

<?php 
echo "<input type='hidden' name='new-what' value='$type'>";
foreach ($elements as $element){
	$type = $element['type'];
	$name = $element['name'];
	$label = $element['label'];
	$placeholder = $element['placeholder'];
	
	echo "<div class='form-group'>";
	echo "<label for='$name' class='col-sm-5 control-label'>$label</label>";
	echo "<div class='col-sm-7'>";
	echo "<input type='$type' class='form-control' id='$name' placeholder='$placeholder' name='$name' required='required'>";
	echo "</div>";
	echo "</div>";
	
}

?>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary" name="save">Save</button>
			</div>
		</div>
	</form>
</div>

<?php 
require_once ('layout/htmlbuttom.php');
?>