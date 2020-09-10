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
	
    $bookid = $_POST['bookId'];
    $checkout = $_POST['checkout'];
    $copiesavailable = $_POST['copiesavailable'];
	
	$query = "UPDATE books set check_out_flg='$copiesavailable'-'$checkout' where bookId=$bookid";
    $name = $_POST['name'];
    $_SESSION['checkout'] = $name;

	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: book_inventory.php");
	
	
}

$conn->close();
?>