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
        <link rel="stylesheet" 		href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <link 		rel="stylesheet" href="styles.css" > 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 		
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<h1>Card Update</h1>
<!-- Navbar -->
	<nav class="navbar navbar-default">
		  <div class="container">
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav navbar-right">
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
            <h1>Card 1</h1>
            <h2>25 Points</h2><br>
                <form action="./card-list.php">
                    Update Card Name:<br>
                    <input type='text' name='cardname'><br>
                    Update Points:<br>
                    <input type='text' name='point value'><br><br>
                    <input type='submit' value='OK'>
                </form>
          </detail>
        </section>
	</body>
</html>
