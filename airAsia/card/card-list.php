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
		<h1>Gift Cards</h1>
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

//reference login.php info
require_once '../model/db_connect.php';

//connect
$conn = new mysqli ($hn, $un, $pw, $db);
if ($conn->connect_error) die ($conn->connect_error);

    $query = "SELECT * from giftcard";

    $result = $conn->query($query);
    if(!$result) die($conn->error);

    $rows = $result->num_rows;

    for ($j=0; $j<$rows; ++$j){
        
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_NUM);
    
        
                
        echo <<<_END
            <table>
                <tr>
                    <td>
                    <img src="../images/giftcard1.jpeg">
                    <pre>
                    ID: $row[0]
                    Card Name:<a href='./card-details.php?id=$row[0]'>$row[1]</a>
                    Card Type:$row[2]
                    Card Value:$row[3]
                    Points:$row[4]
                    </pre>

                    <form action='./card-delete.php' method='post'>
                        <input type='hidden' name='delete' value='yes'>
                        <input type='hidden' name='cardId' value='$row[0]'>
                        <input type='submit' value='Delete Card'>
                    </form>
                    </td>
                </tr>
                <table>
            _END;
      }
$conn->close();
?>
