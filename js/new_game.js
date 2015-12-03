function getGroups(sportId, tournamentId) {
	$.ajax({
		type : 'POST',
		url : 'ajax/get_group.php',
		data : {
			'sportId' : sportId,
			'tournamentId' : tournamentId
		},
		success : function(data) {
			$('#group').html(data);
		}
	});
}

function getTeams(groupId) {
	$.ajax({
		type : 'POST',
		url : 'ajax/get_teams.php',
		data : {
			'groupId' : groupId
		},
		success : function(data) {
			$('#team1').html(data);
		}
	});
}

function getGames(groupId) {
	$.ajax({
		type : 'POST',
		url : 'ajax/get_games.php',
		data : {
			'groupId' : groupId
		},
		success : function(data) {
			$('#allGames').html(data);
		}
	});
}

function getTeams2(groupId, team1Id) {
	$.ajax({
		type : 'POST',
		url : 'ajax/get_teams.php',
		data : {
			'groupId' : groupId,
			'team1Id' : team1Id
		},
		success : function(data) {
			$('#team2').html(data);
		}
	});
}

function getForms(sportId) {
	$.ajax({
		type : 'POST',
		url : 'ajax/get_group.php',
		data : {
			'sportId' : sportId,
		},
		success : function(data) {
			$('#gameForm').html(data);
		}
	});
}

function getValue(elementId, targetId){
    var res=$('#'+elementId).val();
    var targetElement = document.getElementById(targetId);
    targetElement.value = res;
   // alert(model);
}