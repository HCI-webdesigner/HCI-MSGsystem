window.onload = init;
function init(){
        initSlide(0);

        jQuery(function($){
	        $("#slidebox").slideBox({
	           	delay : 5
	    	});
	    });
    document.getElementById("user").onblur = checkUser;
    document.getElementById("login-button").onclick = registerUser;
    
}

function checkUser(){//检查email的格式是否正确
	var user = document.getElementById("user");
    user.className = "thinking";
    userFlag = false;
	var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
    if(reg.test(user.value) == true){
		user.className = "correct";
        userFlag = true;
	}else {
        user.className = "error";
        userFlag = false;
    }
}

function registerUser(){
    
}
