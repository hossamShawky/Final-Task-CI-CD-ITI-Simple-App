<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "notes_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Insert note into database
$note = $_POST["note"];
$sql = "INSERT INTO notes (note) VALUES ('$note')";

if ($conn->query($sql) === TRUE) {
	echo "Note saved successfully.";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
