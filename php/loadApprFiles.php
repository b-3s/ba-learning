<?php

$pageTopic = $_POST['topics'];
if ($pageTopic === "AS-MBA"){
	$pageTopic = "asmba";
}

// echo "<h1>";
// echo "$pageTopic";
// echo "</h1>";


//SQL Query - show appropriate files
$sqllookup = "SELECT filename, description FROM $pageTopic";




// Verbindung aufnehmen
try 
{
	$dbh = new PDO ("mysql:dbname=ba-learning-db; host=localhost", "root", ""); 
	//print "Verbindung erfolgreich hergestellt."; 

	$rueckgabe = $dbh->query($sqllookup);
	$ergebnis = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);
	// ausgabe der files
	
	foreach ($ergebnis as $inhalt) {
		print $inhalt['description']."  -  ";
		print "<a href=\"php/uploads/".$pageTopic."/".$inhalt['filename']."\"".">".$inhalt['filename']."</a><br>";
		
	}


	$dbh = null; 
} 
catch(PDOException $e) {
	print $e->getMessage(); 
}



?>