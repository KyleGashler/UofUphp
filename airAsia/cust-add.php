<?php
session_start();

if($_SESSION['username'])//if the username is NOT in session
{

    echo 'welcome ' . $_SESSION['username'];
}else {
    header("Location: loginscreen.php");
}
?>

<!DOCTYPE html>
<html> 
	<head>
		<title>AirAsia</title>		
        <script type='text/javascript' src='validate.js'></script>

<!-- Styleing-->        
        <link rel="stylesheet" 		href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <link 		rel="stylesheet" href="styles.css" > 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 		
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Navbar -->
      
	<nav class="navbar navbar-default">
		  <div class="container">
		
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="index.php">Home</a></li>
                <li><a href="card-add.html">Add New Card</a></li>
				<li><a href="card-list.html">Gift Cards</a></li>
								
			  </ul>
			</div>
		  </div>
		</nav>
        
        
        
        
<!-- Validate Password-->
        <script>
            function validate(form){
                
                var fail = validateUsername(form.username.value)
				
				fail += validatePassword1(form.password1.value)
				fail += validatePassword2(form.password2.value)
				if(form.password1.value!="")
					fail += comparePasswords(form.password1.value, form.password2.value)	
							
				if (fail=="") return true
				else { alert(fail); return false}
            }
        </script>
	</head>
	
	<body> 
        <section>
          <nav1>
            <ul>
                <li><img src="/AirAsia/images/newcustomer.jpg"></li>
            </ul>
          </nav1>    
		<detail>
			<form method="post" action="validate.php" onsubmit="return validate(this)"> 
			 Your User Name:<br>
			    <input type="text" name="username"><br>
			 Your Password:<br>
			 	<input type="password" name="password1"><br>
			 Please Confirm Your Password:<br>
			 	<input type="password"  name="password2"><br>
             Your First Name:<br>
			 	<input type="firstname"  name="firstname"><br>
             Your Last Name<br>
			 	<input type="lastname"  name="lastname"><br>
			 <input type="submit" value="SIGN UP"><br>
		    </form>
        </detail>
        </section>
	</body>
</html>