<html>
			<head>
				<title>Music Details</title>
				<link rel='stylesheet' href='../styles.css'>
			</head>
			<body>
				<a>
					<br>
					<center>
					<a href="http://localhost/library-master/home.php"><img height='100' width='200' src='../images/library_logo.jpg'></img></a>
					<br>
					</center>
				</a>
			</body>
</html>

<?php
	require_once '../library_db_login.php';

session_start();
if (isset($_SESSION['username'])) {
    echo 'welcome ' . $_SESSION['username'];
    if (isset($_SESSION['checkout'])){
        echo '<br>' . 'you checked out ' . $_SESSION['checkout'];
    }
} else {
    header("Location: ../login.php");
}

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['musicid'])){
	
	$musicid = $_POST['musicid'];
	$query = "SELECT * FROM music WHERE musicid = '$musicid'";
		
	$result = $conn->query($query);
	if(!$result) die($conn->error);
}
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j){
	$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_NUM);
	
echo <<<_END
	<center>
	<pre>
	<img height='150' width='150' src='$row[5]'></img>
	<br>
	Artist: $row[1]
	Album: $row[2]
	Genre: $row[3]
	Year Released: $row[4]
	Copies Available: $row[6]
	
	</pre>
	</center>
	
	<center>
		<form method="post" action ="checkout.php">
			<input type='hidden' name = 'checkout' value = '1'>
			<input type ='hidden' name ='musicId' value='$row[0]'>
			<input type ='hidden' name = 'copiesavailable' value='$row[6]'>
			<input type="submit" value="Checkout Music">
		</form>	
		<form method="post" action ="music_update.php">
			<input type='hidden' name = 'update' value = 'yes'>
			<input type ='hidden' name ='musicid' value='$row[0]'>
			<input type="submit" value="Update Music">
		</form>	
	
		<form method="post" action ="music_delete.php">
			<input type='hidden' name = 'delete' value = 'yes'>
			<input type ='hidden' name ='musicid' value='$row[0]'>
			<input type="submit" value="Delete Music">
		</form>
	
	</center>
	<br>
	<br>
	<a href="../logout.php">Logout</a>
	
_END;

}

$conn->close();
?>