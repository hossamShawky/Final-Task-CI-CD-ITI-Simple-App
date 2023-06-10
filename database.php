$servername = "localhost";
$username = "root";
$password = "your_password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE notes_app";
if ($conn->query($sql) === TRUE) {
	echo "Database created successfully";
} else {
	echo "Error creating database: " . $conn->error;
}
// Select database
mysqli_select_db($conn, "notes_app");

// Create table
$sql = "CREATE TABLE notes (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	note TEXT NOT NULL
)";
if ($conn->query($sql) === TRUE) {
	echo "Table created successfully";
} else {
	echo "Error creating table: " . $conn->error;
}

// Close connection
$conn->close();
