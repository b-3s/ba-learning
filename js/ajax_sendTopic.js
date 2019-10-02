

function sendTopic(){

	let topictopic = $("#topicTitle").html();
	alert ("in sendTopic " + topictopic);

	$.ajax({
	  	method: "POST",
	  	url: "php/loadApprFiles.php",
	  	data: { topics: topictopic },
	   	success: function(result){
	    	$("#dataFiles").html(result);
	 	}
	});



};