<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Запись в таблицу базы в PHP</title>
</head>
<body>
	<form method="get">
		<label>Введите своё имя:</label><br>
		<input type="text" name="name"><br>

		<label>Введите свой email:</label><br>
		<input type="text" name="email"><br>

		<label>Введите заметки:</label><br>
		<input type="text" name="notes"><br>
		<br>
		<input type="submit" name="formSubmit" value="Отправить">
	</form>

	<?php
		if (isset($_GET['formSubmit'])) {
			$nameform=$_GET['name'];
            $emailform=$_GET['email'];
            $notesform=$_GET['notes'];
			$mysqli = new mysqli("localhost", "master", "master", "lartest1");
			if ($mysqli->connect_errno) {
				echo "Извините, возникла проблема на сайте";
				exit();
			}
			$name= '"' .$mysqli->real_escape_string($nameform).'"';
			$email='"' .$mysqli->real_escape_string($emailform).'"';
			$notes='"' .$mysqli->real_escape_string($notesform).'"';
			$query = "INSERT INTO users1 (name, email, notes) VALUES ($name,$email, $notes)";
			$result=$mysqli->query($query);
			if($result){
				print('Успешно !'. '<br>');
			}
			$mysqli->close();

			echo '<script>window.location.href = "index.php";</script>';
		}
    ?>

</body>
</html>