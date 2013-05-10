$(document).ready( function () {
    // Get our add button and setup an event listener
	$("#button1").click(function(){
		//error message for blank username
		if($("#eventname").val()==""){alert("You must enter a new Event Name");}
		//make AJAX call for filled out username
		else{ nameChange();}
	});
	
	//Get any of the delete buttons and setup an event listener
	$(":button").click(function(){
		if($(this).val()=="Delete"){
			var value= $(this).attr('name');
			value = value.substring(1);
			deleteannouncement(value);
		}
	});
	
});


/* This is the function that is called when the "add" button is clicked
 * It gets the title and announcement content and sends it to a PHP 
 * file that writes it to the appropriate text file
 */
function nameChange() {
	
	alert($("#event").val());
	alert($("#eventname").val());
	
	
	//retrieve announcement information
	var temp1=$("#event").val();
	var temp2=$("#eventname").val();
	var mydata = {oldid : temp1, newname : temp2};
	
	request = $.ajax({
		url: "changeeventname.php",
		type: "get",
		data: mydata,
	});
	
	alert("The name of your event has been changed, and the change should be viewable on this page.");
	
	var link="editphoto.php?event="+temp1;
	
	//reload the page when the request finishes
	request.done(window.location.replace(link));
	//var var2= '2';
	//$('#event').val(temp2);
	//alert($("#event").val());
	//$("#pickevent").submit()
	//request.done($("#pickevent").submit());
	
}

function submitForm (var1) {
	//location.reload();
	//$("#pickevent").submit();

	$("#pickevent").submit();
}

/* This is the function that is called when any "Delete" button is clicked
 * It gets the number of the announcement and sends it to a PHP file
 * that deletes the corresponding announcement
 */
function deleteannouncement(anumber) {

	//retrieve announcement information
	var mydata = {number : anumber};
	
	request = $.ajax({
		url: "deleteannouncement.php",
		type: "get",
		data: mydata,
	});
	
	alert("Your announcement has been successfully deleted");
	
	//reload the page when the request finishes
	request.done(location.reload());
}