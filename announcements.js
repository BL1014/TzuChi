$(document).ready( function () {
    // Get our add button and setup an event listener
	$("#addButton").click(function(){
		//error message for blank username
		if($("#title").val()=="" || $("#announcement").val()==""){alert("You must enter a Title and an Announcement");}
		//make AJAX call for filled out username
		else{ addannouncement();}
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
function addannouncement() {
	
	//retrieve announcement information
	var temp1=$("#title").val();
	var temp2=$("#announcement").val();
	var mydata = {title : temp1, announcement : temp2};
	
	request = $.ajax({
		url: "newannouncement.php",
		type: "get",
		data: mydata,
	});
	
	alert("Your announcement has been added and should be viewable in the table on the left.");
	
	//reload the page when the request finishes
	request.done(location.reload());
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
