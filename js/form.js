

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

    $("#submit").click(function(){
    	$("#theContent").empty();
    	alert("yes");
    });

    /* end upload form ----------------------------------------  */



});