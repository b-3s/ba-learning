

function sendTopic(){

	let topictopic = $("#topicTitle").html();
	// alert ("in sendTopic " + topictopic);

	$.ajax({
	  	method: "POST",
	  	url: "php/loadApprFiles.php",
	  	data: { topics: topictopic },
	   	success: function(result){
	    	$("#dataFiles").html(result);
	 	}
	});



};

// triggered by search_btn
function sendSearchTopic(){

	alert ("searchInput: " + $("#searchInput").val());
	let topictopic = $("#topicTitle").html();
	let searchInput = $("#searchInput").val();
	// alert ("in sendTopic " + topictopic);

	$.ajax({
	  	method: "POST",
	  	url: "php/loadSearchFiles.php",
	  	data: { topics: topictopic,	searchTopic: searchInput},
	   	success: function(result){
	    	$("#dataFiles").html(result);
	 	}
	});



};