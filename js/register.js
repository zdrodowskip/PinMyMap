function register(){
	//Email Validation
	var emailt = document.getElementById("email").value;
	var atsign = emailt.indexOf("@");
	var dot = emailt.lastIndexOf(".");
	
	if (emailt==null || emailt==""){
		alert("Email is a Required Field");
		return false;
    }
	else if (atsign<1 || dot<atsign+2 || dot+2>=emailt.length) {
        alert("Not a valid e-mail address");
        return false;
    }
	else {
		//Pass email address to the server
		var url = "register.php?email=" + emailt;
		var request = new XMLHttpRequest();
		request.onreadystatechange = function() {
			if (request.readyState == 4 && request.status == 200) {
				if (request.responseText !== 1)
					alert ('Please try again.');
			}
		};
			request.open('GET', url, true);
			request.send(null);
	}
			
}