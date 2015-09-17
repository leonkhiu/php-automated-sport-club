function deletionConform(itemName) {
	var msg;
	msg = "Are you sure you want to permanently delete<br> '" + itemName + "' ?<br> If you delete an item, it will be permanently lost.";
	var agree = confirm(msg);
	if (agree)
		return true;
	else
		return false;
}