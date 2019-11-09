
function sendSearchTopic(){

	let topictopic = $("#topicTitle").html();
	let searchTopic = $("#searchInput").val();
	// alert ("in sendTopic " + topictopic);

	$.ajax({
	  	method: "POST",
	  	url: "php/loadApprFiles.php",
	  	data: { topics: topictopic,
	  			searchTopic:
	  	},
	   	success: function(result){
	    	$("#dataFiles").html(result);
	 	}
	});



};