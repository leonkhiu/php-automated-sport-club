<?php
require_once ('../inc/initialise.php');

$sportId = (isset ( $_GET ['sportId'] )) ? ( int ) $_GET ['sportId'] : 1;
$groupId = (isset ( $_GET ['groupId'] )) ? ( int ) $_GET ['groupId'] : 1;

$sports = $sport->findAll ();
if ($sportId > 0) {
	$groups = $groups->findBySportID ( $sportId );
}
$sportScoring = SportScoring::findBySportId ( $sportId );

if ($groupId > 0) {
	$groupTeams = $groupTeam->findBygroupID ( $groupId );
}

$teams = $teamName = array ();
foreach ( $groupTeams as $team ) {
	$teams [] = $team->team_id;
}

$gameId = $team1_Id = $team2_Id = array ();
$games = $game->findByGroupId ( $groupId, true );
foreach ( $games as $game ) {
	$team1_Id [] = $game->first_team_id;
	$team2_Id [] = $game->second_team_id;
	$gameId [] = $game->id;
}

$teamGame = array ();
for($i = 0; $i < count ( $teams ); $i ++) {
	$totalGames = 0;
	for($j = 0; $j < count ( $gameId ); $j ++) {
		if ($teams [$i] == $team1_Id [$j] || $teams [$i] == $team2_Id [$j]) {
			$totalGames ++;
		}
	}
	$teamGame [] = array (
			$teams [$i],
			$totalGames 
	);
}

/**
 * ***********************Teams and total points**********************
 */
$teamResult = array ();
for($i = 0; $i < count ( $gameId ); $i ++) {
	$result = Score::gameResult ( $gameId [$i] );
	//
	$gameScores = Score::findByGameId ( $gameId [$i] );
	
	//
	$t1PointDifference = Score::pointDifference ( $gameId [$i] );
	
	if ($t1PointDifference > 0) {
		$t2PointDifference = (- 1 * $t1PointDifference);
	} elseif ($t1PointDifference < 0) {
		$t2PointDifference = (abs ( $t1PointDifference ));
	} elseif ($t1PointDifference == 0) {
		$t2PointDifference = "0";
	}
	
	$t1Gol = $gameScores->t1_point;
	$t2Gol = $gameScores->t2_point;
	
	$teamResult [] = array (
			$team1_Id [$i],
			$result,
			$t1Gol,
			$t1PointDifference 
	);
	
	if ($result == "win") {
		$teamResult [] = array (
				$team2_Id [$i],
				"loss",
				$t2Gol,
				$t2PointDifference 
		);
	} elseif ($result == "loss") {
		$teamResult [] = array (
				$team2_Id [$i],
				"win",
				$t2Gol,
				$t2PointDifference 
		);
	} else {
		$teamResult [] = array (
				$team2_Id [$i],
				"draw",
				$t2Gol,
				$t2PointDifference 
		);
	}
}

$teamPoints = array ();
for($i = 0; $i < count ( $teamResult ); $i ++) {
	$tmpId = $teamResult [$i] [0];
	$tmpResult = result2score ( $sportScoring, $teamResult [$i] [1] );
	$teamPoints [] = array (
			$tmpId,
			$tmpResult 
	);
}

$teamTotalPoints = array ();
for($j = 0; $j < count ( $teams ); $j ++) {
	$totalPoints = $golFor = $golDifference = 0;
	for($i = 0; $i < count ( $teamPoints ); $i ++) {
		if ($teams [$j] == $teamPoints [$i] [0]) {
			$totalPoints += $teamPoints [$i] [1];
			$golFor += $teamResult [$i] [2];
			$golDifference += $teamResult [$i] [3];
		}
	}
	$teamTotalPoints [] = array (
			$teams [$j],
			$totalPoints,
			$golFor,
			$golDifference 
	);
}

usort ( $teamTotalPoints, function ($a, $b) {
	return $a [1] - $b [1];
} );

$FinalArray = array_reverse ( $teamTotalPoints );

/**
 * **************************************************************
 */
/*
 * echo "<pre>";
 * print_r($teamTotalPoints);
 * echo "</pre>";
 */

// ////////////////////////////////////////////////////output

echo "<ul class='nav nav-tabs'>";
foreach ( $sports as $sport ) {
	echo "<li role='presentation'";
	if ($sport->id == $sportId) {
		echo " class='active' ";
	}
	echo "><a href='?sportId=$sport->id'>$sport->name</a></li>";
}
echo "</ul>";
echo "<br>";
if ($sportId > 0) {
	echo "<ul class='nav nav-pills'>";
	foreach ( $groups as $group ) {
		$groupLink = currentfile () . urlAddorChangeParameter ( 'groupId', $group->id );
		echo "<li role='presentation'";
		if ($group->id == $groupId) {
			echo " class='active' ";
		}
		echo "><a href='$groupLink'>$group->name</a></li>";
	}
	echo "</ul>";
}

?>
<table class="table table-hover table-condensed">
	<thead>
		<tr>
			<th>Position</th>
			<th>Team</th>
			<th>Played</th>
			<th>W</th>
			<th>D</th>
			<th>L</th>
			<th>F</th>
			<th>A</th>
			<th>GD</th>
			<th>Pts</th>
		</tr>
	</thead>
	<tbody>
		<?php
		for($i = 0; $i < count ( $FinalArray ); $i ++) {
			$position = $i + 1;
			echo "<tr>";
			echo "<td>$position</td>";
			$link = "../moreabout.php?teamId=" . $FinalArray [$i] [0];
			echo "<td><a href='$link'>" . Team::findNameById ( $FinalArray [$i] [0] ) . "</a></td>";
			
			for($j = 0; $j < count ( $FinalArray ); $j ++) {
				if ($FinalArray [$i] [0] == $teamGame [$j] [0]) {
					echo "<td>" . $teamGame [$j] [1] . "</td>";
				}
			}
			
			$win = 0;
			for($k = 0; $k < count ( $teamResult ); $k ++) {
				if ($FinalArray [$i] [0] == $teamResult [$k] [0] && $teamResult [$k] [1] == "win") {
					$win ++;
				}
			}
			echo "<td>$win</td>";
			
			$draw = 0;
			for($k = 0; $k < count ( $teamResult ); $k ++) {
				if ($FinalArray [$i] [0] == $teamResult [$k] [0] && $teamResult [$k] [1] == "draw") {
					$draw ++;
				}
			}
			echo "<td>$draw</td>";
			
			$loss = 0;
			for($k = 0; $k < count ( $teamResult ); $k ++) {
				if ($FinalArray [$i] [0] == $teamResult [$k] [0] && $teamResult [$k] [1] == "loss") {
					$loss ++;
				}
			}
			
			echo "<td>$loss</td>";
			
			echo "<td>" . $FinalArray [$i] [2] . "</td>";
			echo "<td>" . ($FinalArray [$i] [2] - $FinalArray [$i] [3]) . "</td>";
			echo "<td>" . $FinalArray [$i] [3] . "</td>";
			echo "<td>" . $FinalArray [$i] [1] . "</td>";
			
			echo "</tr>";
		}
		?>

	</tbody>
</table>

<?php
function result2score($sportScoring, $result) {
	return $sportScoring->$result;
}

?>