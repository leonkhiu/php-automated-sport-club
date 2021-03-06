<?php
function __autoload($classname) {
	$classname = strtolower ( $classname );
	$path = "../inc/{$classname}.php";
	if (file_exists ( $path )) {
		require_once ($path);
	} else {
		die ( "The file: {$classname}.php could not be found." );
	}
}
function makeHash($string) {
	return hash ( "md5", $string );
}
function redirectTo($location = NULL) {
	if ($location != NULL) {
		header ( "location: {$location}" );
		exit ();
	}
}

/**
 * Display all objects in one table
 *
 * @param Object $objects        	
 * @param Array $columns 
 * @param Boolean $view             	
 * @param Boolean $edit        	
 * @param Boolean $remove        	
 * @param Integer $startId        	
 * @return string as a HTML table
 */
function showAll($objects, $columns, $view = false, $edit = false, $remove = false, $startId = 1) {
	$result = "";
	$result .= '<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<thead>
        <tr>
          <th>#</th>';
	
	foreach ( $columns as $column ) {
		$content = ucfirst ( $column );
		if ($column == "uid") {
			$content = "Username";
		}
		if ($column == "first_team_id") {
			$content = "Host";
		}
		if ($column == "second_team_id") {
			$content = "Guest";
		}
		
		if ($column == "club_id") {
			$content = "Club";
		}
		
		if ($column == "sport_id") {
			$content = "Sport";
		}
		
		if ($column == "tournament_id") {
			$content = "Tournament";
		}
		
		if ($column == "permission_id") {
			$content = "Permission";
		}
		
		$result .= "<th>$content</th>";
	}
	
	if ($view) {
		$result .= "<th></th>";
	}
	if ($edit) {
		$result .= "<th></th>";
	}
	if ($remove) {
		$result .= "<th></th>";
	}
	
	$result .= "
        </tr>
      </thead>
      <tbody>";
	foreach ( $objects as $object ) {
		
		$result .= "
		<tr >
		<td>$startId</td>";
		foreach ( $columns as $column ) {
			if ($column == "date" || $column == "last_update") {
				$content = date ( 'Y-m-d H:i:s', $object->$column );
			} elseif ($column == "active") {
				if ($object->$column == 1) {
					$content = "Active";
				} else {
					$content = "Not active";
				}
			} elseif ($column == "done") {
				if ($object->$column == 1) {
					$content = "Yes";
				} else {
					$content = "No";
				}
			} elseif ($column == "uid") {
				if($object->$column == 0){
					$content = "Unknown";
				} else {
					$content = User::findUsernameById ( $object->$column );
				}
			} elseif($column == "first_team_id" || $column == "second_team_id"){
				$content = Team::findNameById ( $object->$column );
					
			}elseif($column == "club_id"){
				$content = Club::findNameById($object->club_id);			
			}elseif($column == "sport_id"){
				$content = Sport::findNameById($object->sport_id);
			} elseif($column == "tournament_id"){	
				$content = Tournament::findNameById($object->tournament_id);
			} elseif($column == "permission_id"){
				
				$content = Permission::findByID($object->permission_id);
				$content = $content->title;
				
			}else {
				$content = $object->$column;
			}
			$result .= "<td>$content</td>";
		}
	
		if(isset($object->id)){
			$id = $object->id;
		} elseif(isset($object->uid )){
			$id=$object->uid; 
		} else{
			$id = 0;
		}
		
		
		if ($view) {
			$viewLink = currentFile () . urlAddorChangeParameter ( "viewId", $id );
			$result .= "<td><a class='btn btn-default' role='button' href='$viewLink'>View</a></td>";
		}
		
		if ($edit) {
			$editLink = currentFile () . "?editId=" . $id;
			$result .= "<td><a class='btn btn-default' role='button' href='$editLink'>Edit</a></td>";
		}
		if ($remove) {
			$removeLink = currentFile () . "?delId=" . $id;
			//$delConfirmMsg = "Are you sure you want to permanently delete this item?<br><br> If you delete an item, it will be permanently lost.";
			// $result.="<td><a href='$removeLink' class='btn btn-danger delConfirm' role='button' title='$delConfirmMsg'>Delete</a></td>";
			$result .= "<td><a  class='btn btn-danger' onclick=deleteConfirmation('" . $removeLink . "') role='button'>Delete</a></td>";
		}
		
		$result .= "</tr>";
		$startId ++;
	}
	
	$result .= "
      </tbody>
	</table>
</div>";
	return $result;
}
function currentfile() {
	return basename ( $_SERVER ['PHP_SELF'] );
}
function formToken() {
	$today = time ();
	$yesterday = $today - 86400;
	$tmp1 = (rand ( $yesterday, $today )) . uniqid ();
	return hash ( "md5", $tmp1 );
}
function urlAddorChangeParameter($parameter, $value) {
	$params = array ();
	$output = "?";
	$firstRun = true;
	foreach ( $_GET as $key => $val ) {
		if ($key != $parameter) {
			if (! $firstRun) {
				$output .= "&";
			} else {
				$firstRun = false;
			}
			$output .= $key . "=" . urlencode ( $val );
		}
	}
	if (! $firstRun)
		$output .= "&";
	$output .= $parameter . "=" . urlencode ( $value );
	return htmlentities ( $output );
}
function moreSpace() {
	return "<div class='more-space'></div>";
}
function systemLog($uid, $message) {
	$log = new SystemLog ();
	$log->uid = $uid;
	$log->msg = $message;
	$log->date = time ();
	$log->save ();
}
function showMessage($messages) {
	$output = "";
	if (count ( $messages ) > 0) {
		$output .= '<div class="alert alert-info alert-dismissible" role="alert">';
		$output .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		foreach ( $messages as $message ) {
			$output .="- ";
			$output .= $message;
			$output .="<br>";
			
		}
		$output .= '</div>';
	}
	return $output;
}
function cookieLogin($uname, $pass) {
	global $user;
	global $session;
	$loggedIn = false;
	
	if (isset ( $_COOKIE [$uname] ) && isset ( $_COOKIE [$pass] )) {
		$uname = $_COOKIE [$uname];
		$pass = $_COOKIE [$pass];
		
		$thisUser = $user->authentication ( $uname, $pass );
		if ($thisUser) {
			if (User::isAcrive ( $thisUser->id )) {
				$session->login ( $thisUser );
				//systemLog ( $thisUser->id, "Cookie Logged in" );
				$loggedIn = true;
			}
		} else {
			$session->logout ();
			unset ( $thisUser );
		}
	}
	return $loggedIn;
}
function rememberMe($rememberMe, $uname = '', $pass = '') {
	if ($rememberMe) {
		setcookie ( WEBSITE_NAME . '_uname', $uname, COOKIE_EXPIRE, '/' );
		setcookie ( WEBSITE_NAME . '_pass', $pass, COOKIE_EXPIRE, '/' );
	} else {
		if (isset ( $_COOKIE [WEBSITE_NAME . '_uname'] )) {
			unset ( $_COOKIE [WEBSITE_NAME . '_uname'] );
			unset ( $_COOKIE [WEBSITE_NAME . '_pass'] );
			setcookie ( WEBSITE_NAME . '_uname', " ", time () - 3600 , '/' );
			setcookie ( WEBSITE_NAME . '_pass', " ", time () - 3600 , '/' );
		}
	}
}


function showForm($formId){

	$result = "";
	$form=DFForm::findByID($formId);
	$formElements=DFUserForm::findElements($form->id);

	$result.= "<h3>$form->title <small>$form->description</small></h3>";
	#----------------------------------------Form begin
	$result.= "<form method='post' name=\"$form->title\" class='form-horizontal'>";

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

		$result.= "<div class='form-group'>";
		$result.= "<label for=\"$elementName\" class=\"col-sm-4 control-label $required\">$elementName</label>";

		if($hasChild){
			if($list){
				$result.= "<label for=\"$elementName\" class=\"$labelClassName\"><select class='form-control' id=\"$elementName\">";
				if(!empty($helpText)){
					$result.= "<span class='help-block small'>$helpText</span>";
				}
			}
			foreach ($elementChildren as $elementChild){
				if($list){
					$result.= "<option id=\"$elementName\" value=\"$elementChild->text\" $required>$elementChild->text</option>";
				} else {
					$result.= "<label class=\"$labelClassName\">";
					$result.= "<input type=\"$elementType\" id=\"$elementName\" name=\"$elementName\" value=\"$elementChild->text\" $required> $elementChild->text";
					$result.= "</label>";
				}

			}
			if($list){
				$result.= "</select></label>";
			}
		} else{
			$result.= "<div class='col-md-4 col-xs-3'>";
			if($textarea){
				$result.= "<textarea class='form-control input-sm' rows='3' id=\"$elementName\" placeholder=\"$helpText\" $required></textarea>";
			} else {
				$result.= "<input type=\"$elementType\" id=\"$elementName\" class='form-control'";
				if(!empty($pattern)){
					$result.= " pattern=\"$pattern\"";
				}
					
				if($elementType == "number"){
					$result.= " min='0'";
				}
				$result.= " placeholder=\"$helpText\" title=\"$helpText\" $required>";
				if($elementType == "time" || $elementType == "date"){
					if(!empty($helpText)){
						$result.= "<span class='help-block small'>$helpText</span>";
					}
				}
			}
			$result.= "</div>";
		}
		$result.= "</div>";
	}

	$result.= "<div class='form-group'>";
	$result.= "<label class='col-sm-4 control-label'></label>";
	$result.= "<div class='col-md-4 col-xs-3'>";
	$result.= "<button type='submit' class='btn btn-primary'>Submit</button>";
	$result.= "</div>";
	$result.= "</div>";
	$result.= "</form>";
	#----------------------------------------Form end

	return $result;
}

function showRawArray($rawArray){
	echo "<pre>";
	print_r($rawArray);
	//var_dump($rawArray);
	echo "</pre>";
}
?>