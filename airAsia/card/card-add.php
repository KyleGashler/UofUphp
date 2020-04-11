<?php
session_start();
if($_SESSION['username'])//if the username is NOT in session
{
    echo 'welcome ' . $_SESSION['username'];
}else {
    header("Location: ../loginscreen.php");
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
		<h1></h1>
		
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
	
<!-- Card Info -->	

<section>

  <nav1>
    <ul>
        <li><img src="../images/giftcard1.jpeg"></li>
    </ul>
  </nav1>
  <detail>

        <form method="post" action="card-add.php">
			Enter Name of New Card:<br>
			<input type='text' name='cardname'><br>
			Enter Point Value of New Card:<br>
			<input type='text' name='pointvalue'><br>
			Enter Cash Value of New Card:<br>
			<input type='text' name='cardvalue'><br><br>
			Enter Type of  New Card:<br>
			<input type='text' name='type'><br><br>
			<input type='submit' value='OK'>
		</form>
  </detail>
</section>

<?php
    require_once  '../model/db_connect.php';

	$conn = new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error);

	if(isset($_POST['cardname'])) {
		$cardName = $_POST['cardname'];
		$pointValue = $_POST['pointvalue'];	
		$cardValue = $_POST['cardvalue'];
		$type = $_POST['type'];
		$query = "INSERT INTO giftcard(cardName, cardType, cardValue, points)
		VALUES( '$cardName', '$type', '$cardValue', '$pointValue')";
		
		$result = $conn->query($query); 
		if(!$result){ 
			die($conn->error);
		 }else{
			echo 'success';
		}
		
		header("Location: ../index.php");
	}
	$conn->close();
	?>
	</body>
</html>