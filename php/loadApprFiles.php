<?php

$pageTopic = htmlspecialchars($_POST['topics']);
if ($pageTopic === "AS-MBA"){
	$pageTopic = "asmba";
}

//SQL Query - show appropriate files
$sqllookup = "SELECT author, filename, description FROM $pageTopic";


// Verbindung aufnehmen
try
{
	$dbh = new PDO ("mysql:dbname=ba-learning-db; host=localhost", "root", "");

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