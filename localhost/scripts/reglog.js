function Reg(){
	var x = document.forms["reg"]["email"].value;
	var y = document.forms["reg"]["name"].value;
	var pass = document.forms["reg"]["password"].value;
	var conp = document.forms["reg"]["ConPass"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");

	if(y == null || y == ""){
		alert("Please enter your Name");
		return false;
	}else if(y > 20){
		alert("Name is more than 20 symbols");
		return false;
	}else if(x == null || x == ""){
		alert("Please enter your Email");
		return false;
	}else if(x > 255){
		alert("Email is more than 255 symbols");
		return false;
	}else if(pass == null || pass == ""){
		alert("Enter password");
		return false;
	}else if(pass != conp){
		alert("You don`t confirm password");
		return false;
	}

	if(atpos < 1 || dotpos < atpos+2 || dotpos+2 >= x.length){
		alert("Not a valid e-mail address");
		return false;
	}else{
		return true;
	}
}