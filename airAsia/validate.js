function validateUsername (field){
    return (field=="") ? "No username was entered. \n" : "";
}


function validatePassword1(field){
	return (field == "") ? "No Password1 was entered.\n" : ""
}

function validatePassword2(field){	
	return (field == "") ? "No Password2 was entered.\n" : ""	
}

function comparePasswords(pass1, pass2){
	if((pass1==pass2) && (pass1!="")) return ""
	else return "Your Passwords do not match\n"	
}