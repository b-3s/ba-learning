$(document).ready(function(){


  //click PDF file links on appr(i.e. gkl.php) pages
  $("#dataFiles").on("click", "a", function(event){

    var str = $(event.target).html();
    var topic = $("#topicTitle").html();
    sessionStorage.setItem('pdfToShow', str);
    sessionStorage.setItem('topic', topic);

    // console.log("str: " + str + ", " + "topicTitle: " + topic);

    if(str.endsWith(".pdf")){
      event.preventDefault();
      window.location.href = "show_viewerjs.php";
    }
    // event.stopPropagation();

  });


}); //----------------------------------------------------



function showApprFileViewerSJ(){

  var topic = sessionStorage.getItem('topic');
  var pdfFile = sessionStorage.getItem('pdfToShow');

  $.ajax({
      method: "POST",
      url: "php/showApprPdfFiles.php",
      data: { topics: topic, files: pdfFile },
      success: function(result){
        $("#showFile").html(result);
    }
  });

}


