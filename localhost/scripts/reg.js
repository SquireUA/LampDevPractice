function Comment(){
	var x = document.forms["comm"]["mess"].value;
	if(x == null || x == ""){
		alert("You don`t write anything");
		return false;
	}else if(x.length > 255){
		alert("Comment is more than 255 symbols");
		return false;
	}else{
		return true;
	}
};

function Answer(x){
    document.forms["comm"]["idanswer"].value = x;
    alert("You answer to this coment");
    return true;
};