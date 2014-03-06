window.onload = init;
var userFlag = passwordFlag = nicknameFlag = false;
function init(){
		//本页面对应栏，下标由0起始,首页为0
        initSlide(0);

    document.getElementById("user").onblur = checkUser;
    document.getElementById("password1").onblur = checkPassword1;
    document.getElementById("password2").onblur = checkPassword2;
    document.getElementById("nickname").onblur = checkNickname;
    document.getElementById("reg-submit").disabled = true;
    document.getElementById("reg-submit").onclick = registerUser;
    
}

function checkUser(){//只检查了邮箱格式，没有检查邮箱是否唯一
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

function checkPassword1(){
    var password = document.getElementById("password1");
    if(password.value.length <6){
        password.className = "error";
    }else password.className = "correct";
    checkFormStatus();
}

function checkPassword2(){
    var password1 = document.getElementById("password1");
    var password2 = document.getElementById("password2");
    if(password2.value != "" && password1.className == "correct" && password1.value == password2.value){
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
    if(nickname.value!=''){
        nickname.className = "correct";//如果nickname唯一
        nicknameFlag = true;
    }else {
        nickname.className = "error";//如果nickname不唯一
        nicknameFlag = false;
    }
    checkFormStatus();
}

function checkFormStatus(){
    var button = document.getElementById("reg-submit");
    if(userFlag && passwordFlag && nicknameFlag){
        button.className = "enable";
        button.disabled = false;
    }else{
        button.disabled = true;
        button.className = "disable";
    }
}

function registerUser(){//提交form
    var password1 = document.getElementById("password1");
    var password2 = document.getElementById("password2");
    password1.value = hex_md5(password1.value);
    password2.value = hex_md5(password2.value);
}
