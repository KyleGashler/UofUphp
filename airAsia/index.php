<html>
    <head>
        <title>AirAsia</title>

        <link rel="stylesheet" 		href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <link 		rel="stylesheet" href="./styles.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    </head>
    <body>
    <?php
    session_start();

    if($_SESSION['username'])//if the username is NOT in session
    {

        echo 'welcome ' . $_SESSION['username'];
    }else {
        header("Location: loginscreen.php");
    }
    ?>
    <h1></h1>

    <!-- Navbar -->

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./login.php">User Login</a></li>
                    <li><a href="./card/card-list.php">Gift Cards</a></li>
                    <li><a href="./logout.php">logout</a></li>
                    <a href="../logout.php">Logout</a>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Portfolio -->

    <div id="portfolio" class="container-fluid text-center bg-grey">
        <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">

                    <h1><img src="./images/jet.jpg"style="width:700px;height:500px;"></h1>
                </div>
                <div class="item">
                    <h1><img src="./images/employees.jpg"style="width:700px;height:500px;"></h1>
                </div>
                <div class="item">
                    <h1><img src="./images/customers.jpg"style="width:700px;height:500px;"></h1>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    </body>
</html>