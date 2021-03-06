<?php
# Core objects
require_once ('dbo.php');
require_once ('site_setting.php');

# Helper objects
require_once ('helper/functions.php');
require_once ('helper/session.php');
require_once ('helper/pagination.php');

# DB objects

require_once ('user.php');
require_once ('sport.php');
require_once ('sport_scoring.php');
require_once ('score.php');
require_once ('final_score.php');
require_once ('team.php');
require_once ('team_sport.php');
require_once ('club.php');
require_once ('tournament.php');
require_once ('groups.php');
require_once ('group_team.php');
require_once ('team_user.php');
require_once ('game.php');
require_once ('system_log.php');
require_once ('syslog.php');
require_once ('security_question.php');
require_once ('ajax_checker.php');
require_once ('permission.php');
require_once ('UserPermission.php');

# Dynamic Forms 
require_once ("dynamic_form/df_form.php");
require_once ("dynamic_form/df_element.php");
require_once ("dynamic_form/df_element_group.php");
require_once ("dynamic_form/df_user_form.php");


$currentFile = currentfile();

?>
