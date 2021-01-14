
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
    }
    else{
        submitButton.disabled = true;

    }
}



function emailCheck(){
    let invalidEmail = document.querySelector('#mailError');

    if(emailValue.match(emailPattern)){
        invalidEmail.style.visibility = 'hidden';
    }
    else{
        invalidEmail.style.visibility = 'visible';
    }
}

function passwordCheck(){
    let invalidPassword = document.querySelector('#pwdError');

    if(passwordValue.match(passwordPattern)){
        invalidPassword.style.visibility = 'hidden';
    }
    else{
        invalidPassword.style.visibility = 'visible';
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