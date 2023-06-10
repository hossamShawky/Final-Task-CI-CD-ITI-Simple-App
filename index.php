<?php
require_once('database.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Simple Notes App</title>
</head>
<body>
	<h1>Notes App</h1>
	<form method="post" action="save_note.php">
		<label for="note">Note:</label>
		<textarea id="note" name="note"></textarea>
		<br><br>
		<input type="submit" value="Save Note">
	</form>
	
	<br><br>
	
	<h2>Notes List</h2>
	
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

	// Get notes
	$sql = "SELECT * FROM notes";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<p>" . $row["note"] . "</p>";
		}
	} else {
		echo "No notes found.";
	}

	$conn->close();
?>
<footer>
      <b>  <e>Just For Final-Task-ITI-CI-CD Project</e> </b>

 </footer>
</body>
</html>
