
<?php 
// In PHP kleiner als 4.1.0 sollten Sie $HTTP_POST_FILES anstatt 
// $_FILES verwenden.

$topic = $_POST['topic'];

$uploaddir = 'uploads/' . $topic . '/';
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);

echo '<pre>';
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

// $topic = $_POST['topic'];
$author = $_POST['author'];
$description = $_POST['description'];
$fileToUpload = basename($uploadfile);

echo "<br>";
print_r ($fileToUpload);

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

$sql = "INSERT INTO GKL (filename, ptah, author, description)
VALUES ('$fileToUpload', 'uploads/gkl/', '$author', '$description')";



if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();




?>
