

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

	if($("#searchInput").val() != ""){
		// alert ("searchInput: " + $("#searchInput").val());
		let topictopic = $("#topicTitle").html();
		let searchInput = $("#searchInput").val();

		$.ajax({
		  	method: "POST",
		  	url: "php/loadSearchFiles.php",
		  	data: { topics: topictopic,	searchTopic: searchInput},
		   	success: function(result){
		    	$("#dataFiles").html(result);
		 	}
		});
	}else{
		alert ("No Search topic or description selected! Try Again!");
	}



};