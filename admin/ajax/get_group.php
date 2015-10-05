<?php
require_once '../../inc/initialise.php';
if (! empty ( $_POST ["sportId"] ) && ! empty ( $_POST ["tournamentId"] )) {
	
	$sportId = ( int ) $_POST ["sportId"];
	$tournamentId = ( int ) $_POST ["tournamentId"];
	
	$groups = Groups::findBySportIdTournamentId ( $sportId, $tournamentId );
	?>
<option value="">Select Group</option>
<?php
	foreach ( $groups as $group ) {
		?>
<option value="<?php echo $group->id; ?>"><?php echo $group->name; ?></option>
<?php
	}
}

if (! empty ( $_POST ["sportId"] ) && ! isset ( $_POST ["tournamentId"] )) {
	
	$sportId = ( int ) $_POST ["sportId"];
	$forms = DFForm::findByField ( 'sport_id', $sportId );
	?>
<option value="">Select Form</option>
<?php
	foreach ( $forms as $form ) {
		?>
<option value="<?php echo $form->id; ?>"><?php echo $form->title; ?></option>
<?php
	}
}

?>