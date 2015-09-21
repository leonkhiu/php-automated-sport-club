function deletionConform(itemName) {
	var msg;
	msg = "Are you sure you want to permanently delete<br> '" + itemName
			+ "' ?<br> If you delete an item, it will be permanently lost.";
	var agree = confirm(msg);
	if (agree)
		return true;
	else
		return false;
}

function welcomeAlert(username) {
	swal({
		title : "Dear " + username + "!",
		text : "Welcome to administrator panel.",
		type : "success",
		timer : 3000,
		showConfirmButton : false
	});
}

function deleteConfirmation(removeLink) {
	swal({
		title : "Are you sure?",
		text : "You will not be able to recover this item!",
		type : "warning",
		showCancelButton : true,
		confirmButtonColor : "#DD6B55",
		confirmButtonText : "Yes, delete it!",
		closeOnConfirm : false
	}, function() {
		swal({
				title: "Deleted!",
				text: "The item will be deleted soon...",
				type: "success",
				showConfirmButton: false
				});
		setTimeout(function(){
			window.location.href = "" + removeLink;
		}, 3000);
		
	});
}