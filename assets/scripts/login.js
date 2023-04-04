const SignUpButton = document.getElementById("SignUp");
const SignInButton = document.getElementById("SignIn");
const container = document.getElementById("container");

SignUpButton.addEventListener('click', function(){
    container.classList.add("right-panel-active")
});

SignInButton.addEventListener('click', function(){
    container.classList.remove("right-panel-active")
});

function validate_user(){
    let password = document.getElementById("password");
    let conf_password = document.getElementById("password2");
    let valid_status = true;
    let statusmsg;

    if(password.value.length < 7){

        statusmsg = ("Password length must be more than 7 characters!");

    }else{

        if (password.value != conf_password.value){
            statusmsg = ("Passwords did not match!");
        }

    };

    
    if (statusmsg){
        valid_status = false;
        alert(statusmsg);
    };

    return valid_status;
};