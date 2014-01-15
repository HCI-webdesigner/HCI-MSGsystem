window.onload = init;
var userFlag = passwordFlag = nicknameFlage = false;
function init(){
    document.getElementById("user").onblur = checkUser;
    document.getElementById("password1").onblur = checkPassword1;
    document.getElementById("login").disabled = false;
    document.getElementById("reg-submit").onclick = registerUser;
    
}

function checkUser(){
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
    checkFormStatus();
}

function checkPassword1(e){
    var password = document.getElementById("password1");
    if(password.value.length <6){
        password.className = "error";
    }else password.className = "correct";
    checkFormStatus();
}

function checkPassword2(e){
    var password1 = document.getElementById("password1");
    var password2 = document.getElementById("password2");
    if(password2.value != "" && password1.value == password2.value){
        password2.className = "correct";
        passwordFlag = true;
    }else{
        password2.className = "error";
        passwordFlag = false;
    }
    checkFormStatus();
}

function checkNickname(){//检查nickname是否唯一
    var nickname = document.getElementById("nickname");
    nickname.className = "thinking";
    if(true){
        nickname.className = "correct";//如果nickname唯一
        nicknameFlage = true;
    }else {
        nickname.className = "error";//如果nickname不唯一
        nicknameFlage = false;
    }
    checkFormStatus();
}

function checkFormStatus(){
    var button = document.getElementById("reg-submit");
    if(userFlag && passwordFlag && passwordFlag){
        button.className = "disable";
        button.disabled = false;
    }else{
        button.disabled = true;
    }
}

function registerUser(){
    
}
