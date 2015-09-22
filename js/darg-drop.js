$(document).ready(function() {
	$(".droppable").sortable({
		update : function(event, ui) {
			Dropped();
		}
	});
});

var i = 1;
function Dropped(event, ui) {
	$(".draggable").each(function() {
		// var p = $(this).position();
		// alert($(this).html());
		// $(this).html("Hello World" + i);

		//$(this).addClass("order" + i);
		$(this).attr("class", "formElement draggable order" + i);
		$('<input>').attr({
		    type: 'hidden',
		    name: 'elementOrder[]',
		    value: i
		    	
		}).appendTo(".order" + i);
		i++;

	});
	refresh();
}