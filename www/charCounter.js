$(document).ready(function(){

/**
 * Character Counter for inputs and text areas
 */
$('.validateInput').each(function(){
	// get current number of characters
	
	var maxLenght = $(this).attr("maxLength");
	//alert($(this).attr("maxLenght") + "  "+$(this).val().length);
	var length = (maxLenght - $(this).val().length);
	// get current number of words
	//var length = $(this).val().split(/\b[\s,\.-:;]*/).length;
	// update characters
	$(this).parent().find('.counter').html('<small>'+length + ' символов осталось'+'</small>');
	// bind on key up event
	$(this).keyup(function(){
	
		var maxLenght = $(this).attr("maxLength");
		// get new length of characters
		var new_length = (maxLenght-$(this).val().length);
		// get new length of words
		//var new_length = $(this).val().split(/\b[\s,\.-:;]*/).length;
		// update
		$(this).parent().find('.counter').html( '<small>'+new_length + ' символов осталось'+'</small>');
	});
});

});	
