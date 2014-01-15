window.onload = init;

function init(){
    document.getElementById("user").onblur = checkUser;
    document.getElementById("password1").onblur = checkPassword1;
    document.getElementById("password2").onblur = checkPassword2;
    document.getElementById("nickname").onblur = checkNickname;
    document.getElementById("sumbit").onclick = registerUser;
}

function checkUser(){
		var user = document.getElementById("user");
    user.className = "thinking";
		var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
    if(reg.test(user.value) == true){
				user.className = "correct";
		}else user.className = "error";
}

function checkPassword1(e){
    var password = document.getElementById("password1");
    if(password.value.length <6){
        password.className = "error";
    }else password.className = "correct";
}

function checkPassword2(e){
    var password1 = document.getElementById("password1");
    var password2 = document.getElementById("password2");
    if(password1.value == password2.value) password2.className = "correct";
    else password2.className = "error";
}

function checkNickname(){
    var nickname = document.getElementById("nickname");

}

function registerUser(){

}
