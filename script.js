//Marie added regex start
const emailInput = document.querySelector('#emailInput')
const passwordInput = document.querySelector('#passwordInput')
const validate = document.querySelector('#validate')
validate.disabled = true
let boolMail = false
let boolPwd = false

const validateEmail = (email) => {
    let patternEmail = /^([^\s@]+@[^\s@]+\.[^\s@]+)$/g
    if (email.match(patternEmail)) {
        return true
    } else {
        return false
    }
}
const validatePwd = (pwd) => {
    let patternOneDigit = /(\d)+/ig
    let patternUpperCase = /([A-Z])+/g
    let patternSpecialChar = /([\+\?\$\^\&])+/g
    let patternNumberofChar = /(?=.{8,18})/g
    let patternLowerCase = /([a-z])+/g

    if ((pwd.match(patternOneDigit)) && (pwd.match(patternUpperCase)) && (pwd.match(patternSpecialChar)) && (pwd.match(patternNumberofChar)) && (pwd.match(patternLowerCase))) {
        return true
    } else {
        return false
    }
}

emailInput.addEventListener('change', (e) => {
    if (validateEmail(e.target.value)) {
        if (!boolMail) {
            boolMail = true
        }
    } else if (!e.target.value) {
        if (boolMail) {
            boolMail = false
        }

    } else {
        if (boolMail) {
            boolMail = false
        }
    }
    if (boolMail && boolPwd) {
        validate.disabled = false
    } else {
        validate.disabled = true
    }

})

passwordInput.addEventListener('change', (e) => {
    if (validatePwd(e.target.value)) {
        if (!boolPwd) {
            boolPwd = true
        }
    } else if (!e.target.value) {
        if (boolPwd) {
            boolPwd = false
        }

    } else {
        if (boolPwd) {
            boolPwd = false
        }
    }
    if (boolMail && boolPwd) {
        validate.disabled = false
    } else {
        validate.disabled = true
    }
})

// Marie added regex end