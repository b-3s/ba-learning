$(document).ready(function(){

	let topictopic = $("#topicTitle").html();
	//alert (topictopic);

	$.ajax({
	  	method: "POST",
	  	url: "php/loadApprFiles.php",
	  	data: { topics: topictopic },
	   	success: function(result){
	    	$("#dataFiles").html(result);
	 	}
	});



});