// database interaction

<?php
require_once '../library_db_login.php';


session_start();
if (isset($_SESSION['username'])) {
    echo 'welcome ' . $_SESSION['username'] . '<br>' . 'you checked out ' . $_SESSION['checkout'];
} else {
    header("Location: ../login.php");
}

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


if(isset($_POST['checkout'])){
	
    $magazineid = $_POST['magazineId'];
    $checkout = $_POST['checkout'];
    $copiesavailable = $_POST['copiesavailable'];
    $name = $_POST['name'];
    $_SESSION['checkout'] = $name;

	$query = "UPDATE magazines set check_out_flg='$copiesavailable'-'$checkout' where magazineId=$magazineid";
    
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: magazine_inventory.php");
	
	
}

$conn->close();
?>