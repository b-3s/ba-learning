

function sendTopic(){

	let topictopic = $("#topicTitle").html();
	// alert ("in sendTopic " + topictopic);

	$.ajax({
	  	method: "POST",
	  	url: "php/loadApprFiles.php",
	  	data: { topics: topictopic },
	   	success: function(result){
	   		// document.location = "show_pdf.php";
	   		// $("#showFile").html(result);
	    	$("#dataFiles").html(result);
	 	}
	});

};



function showApprFileViewerSJ(){

    topic = $("#topicTitle").html();
    alert("topic: " + topic);
    file = $(event.target).html();
    alert("file : " + file);

	$.ajax({
	  	method: "POST",
	  	url: "php/showApprPdfFiles.php",
	  	data: { topics: topic, files: file },
	   	success: function(result){
	   		document.location = "show_viewerjs.php";
	   		$("#showFile").html(result);
	 	}
	});

}



// triggered by search_btn
function sendSearchTopic(){

	if($("#searchInput").val() != ""){
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