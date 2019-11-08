

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


    // submit upload form  ----------------------------------------------------------------------
    $("#submit").click(function(e){
        // alert("yeah in submit anonymous function");
        e.preventDefault();
     //    alert ("topic: " + $("#topic").val());
    	// alert ("author: " + $("#author").val());
     //    alert ("description: " + $("#description").val());
     //    alert ("fileToUpload.files[0].name: " + fileToUpload.files[0].name);
    	var formdata = new FormData();
    	formdata.append("fileToUpload", fileToUpload.files[0]);
    	formdata.append("topic", $("#topic").val());
    	formdata.append("author", $("#author").val());
    	formdata.append("description", $("#description").val());
    	// alert(formdata);
    	var request = new XMLHttpRequest();
		request.open("POST", "php/pdoUpload.php", true);
		request.onload = function(oEvent) {
	        if (request.status == 200) {
	      		sendTopic();
	      		// $("#topicTitle").text("uploaded!!");
	    	} else {
	    		// alert("not working");
	      		$("#topicTitle").text("Error " + request.status + " occurred when trying to upload your file.<br \/>");
	    	};
  		};
		request.send(formdata);

    });

    // MODAL submit upload form  ------------------------------------------------------------------
    $("#md-submit").click(function(e){
        // alert("yeah in MD-submit anonymous function");
        e.preventDefault();
        // alert ("topic: " + $("#md-topic").val());
        // alert ("author: " + $("#md-author").val());
        // alert ("description: " + $("#md-description").val());
        // alert ("fileToUpload.files[0].name: " + md_fileToUpload.files[0].name);
        var formdata = new FormData();
        formdata.append("fileToUpload", md_fileToUpload.files[0]);
        formdata.append("topic", $("#md-topic").val());
        formdata.append("author", $("#md-author").val());
        formdata.append("description", $("#md-description").val());
        // alert(formdata);
        var request = new XMLHttpRequest();
        request.open("POST", "php/pdoUpload.php", true);
        request.onload = function(oEvent) {
            if (request.status == 200) {
                sendTopic();
                // $("#topicTitle").text("uploaded!!");
            } else {
                // alert("not working");
                $("#topicTitle").text("Error " + request.status + " occurred when trying to upload your file.<br \/>");
            };
        };
        request.send(formdata);
        $('#uploadModal').modal('toggle');
    });

    // defined in ajax_sendTopic.js --> send topic to server, get pagecontent and show it in #dataFiles
    sendTopic();

    /* end upload form ----------------------------------------  */




});