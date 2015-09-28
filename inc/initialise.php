<?php
# Core objects
require_once ('dbo.php');
//require_once ('');

# Helper objects
require_once ('helper/functions.php');
require_once ('helper/session.php');
require_once ('helper/pagination.php');

# DB objects
require_once ('user.php');
require_once ('system_log.php');
require_once ('syslog.php');
require_once ('security_question.php');
require_once ('ajax_checker.php');

# Dynamic Forms 
require_once ("dynamic_form/df_form.php");
require_once ("dynamic_form/df_element.php");
require_once ("dynamic_form/df_element_group.php");
require_once ("dynamic_form/df_answer.php");
require_once ("dynamic_form/df_user_form.php");


$currentFile = currentfile();

?>