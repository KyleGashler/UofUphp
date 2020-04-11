<?php

if(isset($_POST['username'])){
    
    $username = fix_string($_POST['username']);
    $password1 = fix_string($_POST['password1']);
	$password2 = fix_string($_POST['password2']);	
    $firstName = fix_string($_POST['firstname']);
	$lastName = fix_string($_POST['lastname']);	
    
    
    $fail = validate_username($username);
    
	$fail .= validate_password1($password1);
	$fail .= validate_password2($password2);
	$fail .= compare_password($password1,$password2);
    
    if ($fail == ""){
		echo "Form data validated successfully<br>";
	}else{
		echo $fail. '<br>';
    }
    //this is where you put code to put into database
    
require_once './model/db_connect.php';

$conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die($conn->connect_error);

    $query = "INSERT INTO user(userName, password, firstName, lastName)
		VALUES( '$username', '$password1', '$firstName', '$lastName')";
		
    $result = $conn->query($query); 
		if(!$result){ 
			die($conn->error);
		 }else{
			echo 'success';
    	}
    
    header("Location: ./index.php");
    
}
function validate_username($field) {
    return ($field == "") ? "No Username was entered <br>" : "";
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



//sanitization function
function fix_string($string){
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return htmlentities ($string);
    
}
	


?>