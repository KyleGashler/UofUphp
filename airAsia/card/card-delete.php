<?php

//reference login.php info
require_once '../model/db_connect.php';

//connect
$conn = new mysqli ($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete'])){

    $cardId = $_POST['cardId'];
    $query = "delete from giftcard where cardId='$cardId' ";

    
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    
      header("Location: card-list.php");
    }


$conn->close();

?>