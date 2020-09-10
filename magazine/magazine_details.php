<html>
			<head>
				<title>Magazine Details</title>
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
                <br>
                <br>
                <a href="../logout.php">Logout</a>
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

if(isset($_POST['magazineid'])){
	
	$magazineid = $_POST['magazineid'];
	$query = "SELECT * FROM magazines WHERE magazineid = '$magazineid'";
		
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
	<img height='150' width='150' src='$row[6]'></img>
	<br>
	Title: $row[1]
	Topic: $row[2]
	Publisher: $row[3]
	Year Published: $row[4]
	Issue Number: $row[5]
	Copies Available: $row[7]
		
	</pre>
	</center>
	
	<center>
		<form method="post" action ="checkout.php">
			<input type='hidden' name = 'checkout' value = '1'>
			<input type ='hidden' name ='magazineId' value='$row[0]'>
			<input type ='hidden' name = 'copiesavailable' value='$row[7]'>
			<input type ='hidden' name = 'name' value='$row[1]'>
			<input type="submit" value="Checkout Magazine">
		</form>	
		<form method="post" action ="magazine_update.php">
			<input type='hidden' name = 'update' value = 'yes'>
			<input type ='hidden' name ='magazineid' value='$row[0]'>
			<input type="submit" value="Update magazine">
		</form>	
		<form method="post" action ="magazine_delete.php">
			<input type='hidden' name = 'delete' value = 'yes'>
			<input type ='hidden' name ='magazineid' value='$row[0]'>
			<input type="submit" value="Delete magazine">
		</form>
	
	</center>
	
_END;

}

$conn->close();
?>