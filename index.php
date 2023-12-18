<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Работа с таблицей базы в PHP</title>
</head>
<body>
	<form method="get">
		<a href=/create.php>Добавить</a>
	</form>
	
	<?php
		$servername = "localhost";
		$username = "master";
		$password = "master";
		$dbname = "lartest1";

		$linkDel= "/delete.php";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM users1 LIMIT 50";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    echo '<table  class="iksweb">';
		    while($row = mysqli_fetch_assoc($result)) {
		        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["notes"]."</td><td><a href=".'"'."/edit.php?id=". $row['id'] .'"'." >edit</a></td> <td><a href=".'"'."/delete.php?id=". $row['id'] .'"'." >delete</a></td></tr>";
		    }
		    echo '</table>';
		} else {
		    echo "0 results";
		}
		mysqli_close($conn);
	?>

</body>
</html>





<style>
	table.iksweb{
	width: 100%;
	border-collapse:collapse;
	border-spacing:0;
	height: auto;
	}
	table.iksweb,table.iksweb td, table.iksweb th {
	border: 1px solid #595959;
	}
	table.iksweb td,table.iksweb th {
	padding: 3px;
	width: 30px;
	height: 35px;f
	}
	table.iksweb th {
	background: #347c99;
	color: #fff;
	font-weight: normal;
	}
</style>