<?php

require_once ('../conf/conyou.php');

$searchTopic = htmlspecialchars($_POST['searchTopic']);

$pageTopic = htmlspecialchars($_POST['topics']);
if ($pageTopic === "AS-MBA"){
	$pageTopic = "asmba";
}


//SQL Query - show appropriate search files
$sqllookup = "SELECT author, description, filename FROM $pageTopic Where author LIKE LOWER ('%$searchTopic%') OR description LIKE LOWER ('%$searchTopic%') OR filename LIKE LOWER ('%$searchTopic%')";


// Verbindung aufnehmen
try
{
	$dbh = new PDO (MYSQL_SERVER, MYSQL_BENUTZER, "");

	$rueckgabe = $dbh->query($sqllookup);
	$ergebnis = $rueckgabe->fetchAll(PDO::FETCH_ASSOC);

	// ausgabe der files
	print '<table class="table table-striped">';
	print '<thead>';
	print '<tr>';
	print '<th scope="col">author</th>';
	print '<th scope="col">description</th>';
	print '<th scope="col">file</th>';
	print '</tr>';
	print '</thead>';
	print '<tbody>';
	foreach ($ergebnis as $inhalt) {
		print '<tr>';
		print '<td>';
		print $inhalt['author'];
		print '</td>';
		print '<td>';
		print $inhalt['description'];
		print '</td>';
		print '<td>';
		print "<a href=\"php/uploads/".$pageTopic."/".$inhalt['filename']."\"".">".$inhalt['filename']."</a><br>";
		print '</td>';
		print '</tr>';
	}
	print '</tbody>';
	print '</table>';

	$dbh = null;
}
catch(PDOException $e) {
	print $e->getMessage();
}



?>