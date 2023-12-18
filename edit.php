<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Редактирование записей в таблице базы в PHP</title>
</head>
<body>

	<?php

		if (isset($_POST['formSubmit'])) {	
			$nameform=$_POST['name'];
            $emailform=$_POST['email'];
            $notesform=$_POST['notes'];
			$myID = $_POST['id'];
			$mysqli = new mysqli("localhost", "master", "master", "lartest1");
			if ($mysqli->connect_errno) {
				echo "Извините, возникла проблема на сайте";
				exit();
			}
			$name= '"' .$mysqli->real_escape_string($nameform).'"';
			$email='"' .$mysqli->real_escape_string($emailform).'"';
			$notes='"' .$mysqli->real_escape_string($notesform).'"';
			$query = "UPDATE users1 SET name = $name, email = $email, notes = $notes WHERE id =$myID";

			$result=$mysqli->query($query);

			echo '<script>window.location.href = "index.php";</script>';
		}

		$servername = "localhost";
		$username = "master";
		$password = "master";
		$dbname = "lartest1";
		$myID = $_GET['id'];
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM users1 WHERE id=$myID";

		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		echo "<form method=".'"'."post".'"'.">
			<label>ID:</label><br>
			<input type=".'"'."text".'"'." name=".'"'."id".'"'."id=".'"'."disambled".'"'." value=".'"'.$myID.'"'." required><br>
			<label>Имя:</label><br>

			<input type=".'"'."text".'"'." name=".'"'."name".'"'." value=".'"'.$row["name"].'"'." required><br>

			<label>Email:</label><br>
			<input type=".'"'."text".'"'." name=".'"'."email".'"'." value=".'"'.$row["email"].'"'." required><br>

			<label>Заметки:</label><br>
			<input type=".'"'."text".'"'." name=".'"'."notes".'"'." value=".'"'.$row["notes"].'"'." required><br>
			<br>
			<input type=".'"'."submit".'"'." name=".'"'."formSubmit".'"'." value=".'"'."Отправить".'"'.">
		</form>";
		mysqli_close($conn);
//echo '<script>document.getElementById("disambled").disabled = true;</script>';
	?>

</body>
</html>



