    <?php
		$servername = "localhost";
		$username = "master";
		$password = "master";
		$dbname = "lartest1";
		$myID = $_GET['id'];
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "DELETE FROM users1 WHERE id =$myID";

		$result = mysqli_query($conn, $sql);

		mysqli_close($conn);
	?>
	
	<script>window.location.href = "index.php";</script>