
<?php

$alreadyStored = true;

$topic = htmlspecialchars($_POST['topic']);
if ($topic === "AS-MBA"){
	$topic = "asmba";
}

$uploaddir = htmlspecialchars('uploads/' . $topic . '/');
$uploadfile = htmlspecialchars($uploaddir . basename($_FILES['fileToUpload']['name']));

$author = htmlspecialchars($_POST['author']);
$description = htmlspecialchars($_POST['description']);
$fileToUpload = htmlspecialchars(basename($uploadfile));



//add to database
// Verbindung aufnehmen

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ba-learning-db";

// Create connection
$conn = new PDO("mysql:host=localhost; dbname=ba-learning-db", $username, $password);

// Check connection
$error = $conn->errorInfo();
if ($error[0] > 0) {
    header ("Location: http://localhost/ba-learning/index.php");
    print "Fehlercode: " .$error[1]."<br>".$error[2];
}

// check whether the file is already in db
$sqllook = "SELECT * FROM $topic WHERE filename = '$fileToUpload'";
$result = $conn->query($sqllook);
if ($result->rowCount() > 0) {  // todo prepared statement
    $alreadyStored = true;
} else {
    $alreadyStored = false;
    uploadFile();
}

// insert into table
if($alreadyStored === false){
   tableInsert();
}

$conn = null;



function tableInsert(){
    global $conn, $sql, $topic, $fileToUpload, $uploaddir, $author, $description, $error;
    $sql = "INSERT INTO $topic (filename, ptah, author, description)
    VALUES ('$fileToUpload', '$uploaddir', '$author', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        print "Fehlercode: " .$error[1]."<br>".$error[2];
    }

}

// upload file -----------------------------------------------------S
function uploadFile(){
    global $uploadfile, $topic;
    print_r("\$uploadfile: $uploadfile <br>");
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
        echo "Datei ist valide und wurde erfolgreich hochgeladen.\n";
    } else {
        header ("Location: http://localhost/ba-learning/index.php");
    }
}
// end upload file -------------------------------------------------



?>
