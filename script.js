const main = document.querySelector('main');
const form = document.querySelector('form');
const emailInput = document.querySelector('#email');
const passwordInput = document.querySelector('#password');
const submitButton = document.querySelector('#submit');

submitButton.disabled = true;
mailError.style.visibility = "hidden";
pwdError.style.visibility = "hidden";

let emailValue = emailInput.value;
let passwordValue = passwordInput.value;

let emailPattern = /^[\w-]+(\.?[\w-]+)?@{1}[a-z0-9]+\.{1}[a-z]+$/i;
let passwordPattern = /^\S{6,}$/;

function inputsCheck(){
    if(emailValue.match(emailPattern) && passwordValue.match(passwordPattern)){
        submitButton.disabled = false;
        loginFailed.style.visibility = "hidden";
    }
    else{
        submitButton.disabled = true;
        loginFailed.style.visibility = "hidden";
        
    }
}

function emailCheck(){
    let invalidEmail = document.querySelector('#mailError');

    if(emailValue.match(emailPattern)){
        invalidEmail.style.visibility = 'hidden';
        email.style.border = "1px solid green";
    }
    else{
        invalidEmail.style.visibility = 'visible';
        email.style.border = "1px solid red";
    }
}

function passwordCheck(){
    let invalidPassword = document.querySelector('#pwdError');

    if(passwordValue.match(passwordPattern)){
        invalidPassword.style.visibility = 'hidden';
        password.style.border = "1px solid green";
    }
    else{
        invalidPassword.style.visibility = 'visible';
        password.style.border = "1px solid red";
    }
}

emailInput.addEventListener('change', (e) =>{
    emailValue = e.target.value;

    inputsCheck();
    emailCheck();
})

passwordInput.addEventListener('change', (e) =>{
    passwordValue = e.target.value;

    inputsCheck();
    passwordCheck();
})

/*
mail.addEventListener('change', (e) => {
    if (validateEmail(e.target.value)) {
        if (!boolMail) {
            mail.style.border = "1px solid green";
            mailError.style.visibility = "hidden"
            boolMail = true
        } else {
            mail.style.border = "1px solid green";
            mailError.style.visibility = "hidden"
        }
    } else if (!e.target.value) {
        if (boolMail) {
            mail.style.border = "1px solid grey"
            mailError.style.visibility = "hidden"
            boolMail = false
        } else {
            mail.style.border = "1px solid grey"
            mailError.style.visibility = "hidden"
        }
    } else {
        if (boolMail) {
            mail.style.border = "1px solid red"
            mailError.style.visibility = "visible"
            boolMail = false
        } else {
            mail.style.border = "1px solid red"
            mailError.style.visibility = "visible"
        }
    }
    if (boolMail && boolPwd) {
        btn.disabled = false
    } else {
        btn.disabled = true
    }
})
pwd.addEventListener('keyup', (e) => {
    if (validatePwd(e.target.value)) {
        if (!boolPwd) {   
            pwd.style.border = "1px solid green"
            pwdError.style.visibility = "hidden"        
            boolPwd = true
        } else {
            pwd.style.border = "1px solid green"
            pwdError.style.visibility = "hidden" 
        }
    } else if (!e.target.value) {
        if (boolPwd) {
            pwd.style.border = "1px solid grey"
            pwdError.style.visibility = "hidden" 
            boolPwd = false
        } else {
            pwd.style.border = "1px solid grey"
            pwdError.style.visibility = "hidden" 
        }
    } else {
        if (boolPwd) {
            pwd.style.border = "1px solid red"
            pwdError.style.visibility = "visible" 
            boolPwd = false
        } else {
            pwd.style.border = "1px solid red"
            pwdError.style.visibility = "visible" 
        }
    }

*/