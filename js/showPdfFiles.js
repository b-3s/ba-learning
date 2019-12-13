$(document).ready(function(){


  //click PDF file links on appr pages
  $("#dataFiles").on("click", "a", function(event){

    var str = $(event.target).html();

    if(str.endsWith(".pdf")){
      event.preventDefault();
      showApprFileViewerSJ();
    }
    // event.stopPropagation();

  })


}); //----------------------------------------------------



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
        alert("in successfunction");
        // document.location = "show_viewerjs.php";
        // $("#showFile").html(result);
        $("#dataFiles").html(result);
    }
  });

}


