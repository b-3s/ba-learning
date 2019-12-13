<?php

$pageTopic = htmlspecialchars($_POST['topics']);
if ($pageTopic === "AS-MBA"){
	$pageTopic = "asmba";
}

$file = htmlspecialchars($_POST['files']);

// echo ($file);

//ausgabe der files

print "<iframe src=\"/ViewerJS/#../ba-learning/php/uploads/".$pageTopic."/".$file."\""." style=\"height:100vh; width:100%\"></iframe>";

?>