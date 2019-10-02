

$(document).ready(function(){


	/* upload form */

	// show category in form input topic
	let showTopic = $("#topicTitle").html();
	$("#topic").attr("value", showTopic);
	//alert(showTopic);


	// upload form -> show fileName in input-field
    $('input[type="file"]').change(function(e){
        let fileName = e.target.files[0].name;
        $(".custom-file-label").html("<b>" + fileName + "</b>");
    });


    // submit upload form
    $("#submit").click(function(){
    	alert ("val: " + $("#author").val());
    	var formdata = new FormData();
    	formdata.append("fileToUpload", fileToUpload.files[0]);
    	formdata.append("topic", $("#topic").val());
    	formdata.append("author", $("#author").val());
    	formdata.append("description", $("#description").val());
    	alert(formdata);
    	var request = new XMLHttpRequest();
		request.open("POST", "http://localhost/ba-learning/php/pdoUpload.php", true);
		request.onload = function(oEvent) {
	        if (request.status == 200) {
	      		$("#topicTitle").text("uploaded!!");
	      		alert("uploaded");
	    	} else {
	    		alert("not working");
	      		$("#topicTitle").text("Error " + request.status + " occurred when trying to upload your file.<br \/>");
	    	};
  		};
		request.send(formdata);
    	

    });

    // defined in ajax_sendTopic.js --> send topic to server, get pagecontent and show it in #dataFiles
    sendTopic();

    /* end upload form ----------------------------------------  */




});