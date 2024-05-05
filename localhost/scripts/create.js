function Create(){
	var name = document.forms["create"]["createname"].value;
	var price = document.forms["create"]["createprice"].value;
	var description = document.forms["create"]["createdescription"].value;

	if(name == null || name == ""){
		alert("Please enter name of your project");
		return false;
	}else if(name > 100){
		alert("Name of project is more than 100 symbols");
		return false;
	}else if(price == null || price == "" ){
		alert("Please enter price");
		return false;
	}else if(description == null || description == ""){
		alert("Please enter description");
		return false;
	}else{
		return true;
	}
}