<?php


$topic = $_POST['topic'];
if ($topic === "AS-MBA"){
	$topic = "asmba";
}

echo "<h1>Hello World from results.php</h1>";
echo "<p>$topic</p>";




// connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ba-learning-db";

// Create connection
$conn = new PDO("mysql:host=localhost; dbname=ba-learning-db", $username, $password);

// Check connection
$error = $conn->errorInfo();
if ($error[0] > 0) {
    print "Fehlercode: " .$error[1]."<br>".$error[2];
}

// select appropriate db records according to topic:
$sqlfetch = "SELECT * FROM $topic";
$result = $conn->query($sqlfetch);

foreach ($result as $content) {
	print "<a href=\""."php/".$content['ptah'].$content['filename']."\">" .$content['filename']."</a><br>\n";
}

?>