<html>
    <head>
        <title>Book Details</title>
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
    </body>
    <br>
    <br>
    <a href="../logout.php">Logout</a>
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

    if(isset($_POST['bookid'])){

        $bookid = $_POST['bookid'];
        $query = "SELECT * FROM books WHERE bookid = '$bookid'";

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
                    <img height='150' width='150' src='$row[5]'></img>
                    <br>
                    Title: $row[1]
                    Author: $row[2]
                    Genre: $row[3]
                    Year Published: $row[4]
                    Copies Available: $row[6]
                </pre>
                </center>
                <center>
                    <form method="post" action ="checkout.php">
                        <input type='hidden' name = 'checkout' value = '1'>
                        <input type ='hidden' name ='bookId' value='$row[0]'>
                        <input type ='hidden' name ='copiesavailable' value='$row[6]'>
                        <input type ='hidden' name = 'name' value='$row[1]'>
                        <input type="submit" value="Checkout Book">
                    </form>	
                    <form method="post" action ="book_update.php">
                        <input type='hidden' name = 'update' value = 'yes'>
                        <input type ='hidden' name ='bookid' value='$row[0]'>
                        <input type="submit" value="Update Book">
                    </form>	
                    <form method="post" action ="book_delete.php">
                        <input type='hidden' name = 'delete' value = 'yes'>
                        <input type ='hidden' name ='bookid' value='$row[0]'>
                        <input type="submit" value="Delete Book">
                    </form>
            </center>

        _END;
    }
    $conn->close();
?>