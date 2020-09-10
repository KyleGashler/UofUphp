// database interaction

<?php
require_once '../library_db_login.php';


session_start();
if (isset($_SESSION['username'])) {
    echo 'welcome ' . $_SESSION['username'];
} else {
    header("Location: ../login.php");
}

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


if(isset($_POST['checkout'])){
	
    $musicid = $_POST['musicId'];
    $checkout = $_POST['checkout'];
    $copiesavailable = $_POST['copiesavailable'];
	
	$query = "UPDATE music set check_out_flg='$copiesavailable'-'$checkout' where musicId=$musicid";
    
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: music_inventory.php");
	
	
}

$conn->close();
?>