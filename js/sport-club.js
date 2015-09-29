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

function systemlogdeletion(removeLink) {
	swal({
		title : "Are you sure?",
		text : "You will not be able to recover system log!",
		type : "warning",
		showCancelButton : true,
		confirmButtonColor : "#DD6B55",
		confirmButtonText : "Yes, remove all!",
		closeOnConfirm : false
	}, function() {
		swal({
				title: "Deleted!",
				text: "All logs will be deleted soon...",
				type: "success",
				showConfirmButton: false
				});
		setTimeout(function(){
			window.location.href = "" + removeLink;
		}, 3000);
		
	});
}

function checkCounter(url, startID, newID) {
	req = new Ajax.Request(url, {
		contentType : 'text/html; charset=utf-8',
		method : 'post',
		onSuccess : function(response) {
			//containter update "new_count" with the current value of the counter
			newID.update(response.responseText);
			//assign the current counter to variable new
			var newCounter = newID.innerHTML;
			//assign the status of the counter hidden in the HTML code
			var older = startID.innerHTML;
			//if the values are diffrent, it will refresh the list of messages by Ajax.Updater. Using that function we will refresh only the list, and not entire page
			if (older != newCounter) {
				//There was a change, rather then refreshing the entire page to the next comparison, we need a new counter value
				startID.update(newCounter);
				//message list update.
				new Ajax.Updater('updateMe', 'msg.php');
				return false;
			}
		}
	});
}