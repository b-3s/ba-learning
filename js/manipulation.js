$(document).ready(function(){

    changeSearchUpload();

    window.addEventListener('resize', changeSearchUpload);

    function changeSearchUpload(){
        if(window.innerWidth < 768){
            $("#searchUpload form").hide();
            $("#smallWidthButtons").show();
        }else{
            $("#searchUpload form").show();
            $("#smallWidthButtons").hide();
        }
    }

});