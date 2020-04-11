<html>
	<head>
		<title>AirAsia</title>
	    <script type='text/javascript' src='./validate.js'></script>
        <link rel="stylesheet" 		href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <link 		rel="stylesheet" href="./styles.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 		
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
		<h1></h1>
		
<!-- Navbar -->
	<nav class="navbar navbar-default">
		  <div class="container">
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="./index.php">Home</a></li>
                <li><a href="./card/card-add.html">Add New Card</a></li>
				<li><a href="./card/card-list.html">Gift Cards</a></li>
			  </ul>
			</div>
		  </div>
		</nav>
	
<!-- New User Info -->	

<section>
  <nav1>
    <ul>
        <li><img src="./images/newcustomer.jpg"></li>
    </ul>
  </nav1>
  <detail>
        <form method="post" action="" onsubmit="return validate(this)">    
			Enter New User Name:<br>
			<input type='text' name='username'><br>
			Enter New Password:<br>
			<input type='text' name='password1'><br>
            Verify New Password:<br>
			<input type='text' name='password2'><br>
			Enter First Name:<br>
			<input type='text' name='firstName'><br>
			Enter Last Name:<br>
			<input type='text' name='lastName'><br><br>
			<input type='submit' value='OK'>
		</form>

  </detail>
</section>
  ----------------------      
	<body> 
		<table class="signup" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
			<th colspan="2" align="center"> SIGNUP</th>
			<form method="post" action="./validate.php" onsubmit="return validate(this)">
			 <tr><td>Your User Name</td>
			     <td><input type="text" name="username"></td></tr>
			 <tr><td>Your Password</td>
			 	<td><input type="password" name="password1"></td></tr>
			 <tr><td>Please Confirm Your Password</td>
			 	<td><input type="password"  name="password2"></td></tr>
             <tr><td>Your First Name</td>
			 	<td><input type="firstname"  name="firstname"></td></tr>
             <tr><td>Your Last Name</td>
			 	<td><input type="lastname"  name="lastname"></td></tr>
			 <tr><td colspan="2" align="center"><input type="submit" value="SIGN UP"></td></tr>
		    </form>
		</table>
	</body>
  ---------------------------
<?php
    require_once  './model/db_connect.php';

	$conn = new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error);
        
 	if(isset($_POST['username'])) {
        
		$username = fix_string($_POST['username']);
        $password1 = fix_string($_POST['password1']);
	    $password2 = fix_string($_POST['password2']);
        $firstName = fix_string($_POST['firstName']);
        $lastName = fix_string($_POST['lastName']);
    
        $fail = validate_username($username);
        $fail .= validate_password1($password1);
        $fail .= validate_password2($password2);
        $fail .= compare_password($password1,$password2);
    
        if ($fail == ""){
            echo "Form data validated successfully<br>";
        }else{
            echo $fail. '<br>';
        }

		//$type = $_POST['type'];

		$query = "INSERT INTO user(userName, password, firstName, lastName)
		VALUES( '$username', '$password1', '$firstName', '$lastName')";
		
		$result = $conn->query($query); 
		if(!$result){ 
			die($conn->error);
		 }else{
			echo 'success';
            header("Location: ./login.php");
		}
}

function validate_username($field) {
    return ($field == "") ? "No Username was entered <br>" : "";
}

function validate_email($string){
	return ($string == "") ? "No Email was entered.\n" : "";
}

function validate_password1($string){
	return ($string == "") ? "No Password1 was entered.\n" : "";
}

function validate_password2($string){
	return ($string == "") ? "No Password2 was entered.\n" : "";
}

function compare_password($pass1, $pass2){
	if($pass1==$pass2) return "";
	else return "Your Passwords do not match\n";
}

///sanitization function
    function fix_string($string){
	   if (get_magic_quotes_gpc()) $string = stripslashes($string);
	   return htmlentities ($string);
}
	?>
	</body>
</html>