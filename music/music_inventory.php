<html>
			<head>
				<title>Music Inventory</title>
				<link rel='stylesheet' href='../styles.css'>
			</head>
			<body>
			
				<form method="post" action ="music_inventory_add.php">
					<input type="submit" value="add music">
				</form>	
		
				<a>
					<br>
					<center>
					<img height='100' width='200' src='../images/library_logo.jpg'></img>
					<br>
					</center>
				</a>
			</body>
</html>

<?php
	require_once '../library_db_login.php';

				$conn = new mysqli($hn, $un, $pw, $db);
				if($conn->connect_error) die($conn->connect_error);

				$query = "SELECT * FROM music";
	
				$result = $conn->query($query);
				if(!$result) die($conn->error);
	
				$rows = $result->num_rows;

				for($j=0; $j<$rows; ++$j){
					$result->data_seek($j);
					$row = $result->fetch_array(MYSQLI_NUM);
echo <<<_END
	
			
				
				<pre>
	
				<form method="post" action ="music_details.php">
					<input type ='hidden' name ='musicid' value='$row[0]'>
					Artist: <input type='submit' value='$row[1]'>
					<img height='150' width='150' src='$row[5]'></img>
				</form>
						
				</pre>
			
		
			
_END;
				}
?>