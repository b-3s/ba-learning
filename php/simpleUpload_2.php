
<?php 
// In PHP kleiner als 4.1.0 sollten Sie $HTTP_POST_FILES anstatt 
// $_FILES verwenden.

$alreadyStored = true;

$topic = $_POST['topic'];
if ($topic === "AS-MBA"){
	$topic = "asmba";
}

$uploaddir = 'uploads/' . $topic . '/';
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);

// echo '<pre>';


// $topic = $_POST['topic'];
$author = $_POST['author'];
$description = $_POST['description'];
$fileToUpload = basename($uploadfile);

echo "<br>";
print_r ($fileToUpload);
echo "<br>";

print "</pre>";





//add to database
// Verbindung aufnehmen

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ba-learning-db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

// check whether the file is already in db
$sqllook = "SELECT * FROM $topic WHERE filename = '$fileToUpload'";
$result = $conn->query($sqllook);
if ($result->num_rows > 0) {  // todo prepared statement
    $alreadyStored = true;
    print_r ("\$alreadyStored: $alreadyStored");
    echo "<br>";
    echo "is schon vorhanden";
} else {
    $alreadyStored = false;
    echo "we can go on - file nicht vorhanden";
    echo "<br>";
    uploadFile();
}
// echo $sqllook;

// insert into table
if($alreadyStored === false){
   tableInsert(); 
}



$conn->close();



function tableInsert(){
    global $conn, $sql, $topic, $fileToUpload, $uploaddir, $author, $description;
    $sql = "INSERT INTO $topic (filename, ptah, author, description)
    VALUES ('$fileToUpload', '$uploaddir', '$author', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// upload file -----------------------------------------------------S
function uploadFile(){
    global $uploadfile, $topic;
    print_r("\$uploadfile: $uploadfile");
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
        echo "Datei ist valide und wurde erfolgreich hochgeladen.\n";
    } else {
        echo "Möglicherweise eine Dateiupload-Attacke!\n";
    }

    echo 'Weitere Debugging Informationen:';
    print_r($_FILES);


    echo "<br>";
    print_r ($uploadfile);
    echo "<br>";
    print_r($_POST['topic']);
    echo "<br>";
    print_r($_POST['author']);
    echo "<br>";
    print_r($_POST['description']);
    echo "<br>";
    print_r ("\$topic: $topic");
    echo "<br>";
}
// end upload file -------------------------------------------------



?>
