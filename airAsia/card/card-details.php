<?php
session_start();
if($_SESSION['username'])//if the username is NOT in session
{
    echo 'welcome ' . $_SESSION['username'];
}else {
    header("Location: loginscreen.php");
}
?>
<html>
	<head>
		<title>AirAsia</title>
        <link rel="stylesheet" 		href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <link 		rel="stylesheet" href="../styles.css" > 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 		
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<h1>Card Detail</h1>
<!-- Navbar -->
	<nav class="navbar navbar-default">
		  <div class="container">
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav navbar-right">
                <li><a href="../index.php">Home</a></li>  
				<li><a href="./card-add.php">Add New Card</a></li>
				<li><a href="./card-list.php">Gift Cards</a></li>
			  </ul>
			</div>
		  </div>
		</nav>
	</body>
</html>

<?php

require_once '../model/db_connect.php';

$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * from giftcard where cardId=$id ";

    $result = $conn->query($query);
    if (!$result) die($conn->error);
    
    $rows = $result->num_rows;
    
    for($j=0; $j<$rows; ++$j){
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);
        
		echo <<<_END
			<table>
			<tr>
			<td>
			<pre>
			<h1>Card Details</h1>
			<img src="/AirAsia/images/giftcard1.jpeg">
			<form method='post' action='card-details.php'>
				Card Name: <input type='text' name='cardName' value='$row[1]'>
				Card Type: <input type='text' name='cardType' value='$row[2]'>
				Card Value: <input type='text' name='cardValue' value='$row[3]'>
						Card Points: <input type='text' name='points' value='$row[4]'>
				<input type='hidden' name='id' value='$row[0]'>
				<input type='hidden' name='update' value='yes'>
				<input type='submit' value='Update Card'>
			</form>	
			</pre>
			</td>
			</tr>
			</table>
		_END;
			}
    
	}
      
if(isset($_POST['update'])){
	
	$id = $_POST['id'];
	$cardName = $_POST['cardName'];
	$cardType = $_POST['cardType'];
	$cardValue = $_POST['cardValue'];
    $points = $_POST['points'];
	
	$query = "UPDATE giftcard set cardName='$cardName', cardType='$cardType', cardValue='$cardValue', points='$points' where cardId=$id ";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ./card-list.php");
}
$conn->close();
?>