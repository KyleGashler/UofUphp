<html>
<head>
    <title>AirAsia</title>
    <link rel="stylesheet" 		href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <link 		rel="stylesheet" href="./styles.css" >
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
                <li><a href="./card/card-add.html">Add New Card</a></li>
                <li><a href="./card/card-list.html">Gift Cards</a></li>

            </ul>
        </div>
    </div>
</nav>

<!-- Card Info -->
<section>
    <login>Sign into Air Asia
        <form method="post" action="./verifyUser.php">
            Username/Email Address:<br>
            <input type='text' name='username'><br>
            Password:<br>
            <input type='text' name='password'><br><br>
            <input type='submit' value='Login'>
        </form>
    </login>
</section>

<br>
New User?
<a href="./newuser.php">Register</a>
</body>
</html>