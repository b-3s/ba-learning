$(document).ready(function(){


  changeSearchUpload();

  // checkLocation();

  window.addEventListener('resize', changeSearchUpload);


  //show.php -> rotate image
  let angle = 0;
	$("#rotateBtn").click(function(){
  		angle++;
  		if(angle == 1){
	    	$("#image").css("transform", "rotate(90deg)");
  		}else if(angle == 2){
	    	$("#image").css("transform", "rotate(180deg)");
  		}else if(angle == 3){
	    	$("#image").css("transform", "rotate(270deg)");
	    	angle = 0;
  		}
	});




}); //----------------------------------------------------



function changeSearchUpload(){
    if(window.innerWidth < 768){
        $("#searchUpload form").hide();
        $("#smallWidthButtons").show();
    }else{
        $("#searchUpload form").show();
        $("#smallWidthButtons").hide();
    }
}





