
<?php

require_once ('../conf/conyou.php');

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
$conn = new PDO(MYSQL_SERVER, MYSQL_BENUTZER, "");

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

$conn = null;



function tableInsert(){
    global $conn, $sql, $topic, $fileToUpload, $uploaddir, $author, $description, $error;

    $sql = "INSERT INTO $topic (filename, ptah, author, description)
    VALUES (:fileToUpload, :uploaddir, :author, :description)";

    $input = $conn->prepare($sql);

    $input->bindParam(':fileToUpload', $fileToUpload, PDO::PARAM_STR, 300);
    $input->bindParam(':uploaddir', $uploaddir, PDO::PARAM_STR, 300);
    $input->bindParam(':author', $author, PDO::PARAM_STR, 100);
    $input->bindParam(':description', $description, PDO::PARAM_STR, 500);

    $input->execute();

    $conn = null;
}


// upload file -----------------------------------------------------S
function uploadFile(){
    global $uploadfile, $topic;
    print_r("\$uploadfile: $uploadfile <br>");
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
        tableInsert();
    } else {
        header ("Location: http://localhost/ba-learning/index.php");
    }
}
// end upload file -------------------------------------------------



?>
