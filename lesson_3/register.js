const form = document.getElementById("form");
const firstName = document.getElementById("name");
const lastName = document.getElementById("last_name");
const username = document.getElementById("username");
const email = document.getElementById("email");
const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirm_password");
const date = document.getElementById("date");
const submitButton = document.getElementById("submit_button");
const dateOfBirth = document.getElementById("date");
const gender = document.getElementsByName("gender");
newDateInput(dateOfBirth);


function inputError(input, message) {
    const inputCont = input.parentElement;
    inputCont.classList.add('error');
    inputCont.classList.remove('success');
    inputCont.querySelector('.text').innerText = message;
}

function inputSuccess(input) {
    const inputCont = input.parentElement;
    inputCont.classList.remove('error');
    inputCont.classList.add('success');
}

function checkRegexName(name) {
    const nameRegex = /^[a-zA-Z]+([._]?[a-zA-Z]+)*$/;
    return nameRegex.test(name);
}

function checkRegexUserName(user) {
    const nameRegex = /^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$/;
    return nameRegex.test(user);
}

function checkEmailValid(email) {
    const regExp = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    return regExp.test(email);
}

function validatePhoneNumber(phone) {
    let re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
    return re.test(phone);
}


function checkNameData(input, message) {
    let isValid = true;

    if (input.value === '') {
        inputError(input, message);
        isValid = false;
    } else if (!checkRegexName(input.value)) {
        inputError(input, 'Invalid name format');
        isValid = false;
    } else {
        inputSuccess(input);
    }

    return isValid;
}

function checkUserName (input) {
    let isValid = true;

    if (input.value === '') {
        inputError(input, 'Username is required');
        isValid = false;
    } else if (!checkRegexUserName(input.value)) {
        inputError(input, 'Username error');
        isValid = false;
    } else {
        inputSuccess(input);
    }
    return isValid;
}

function checkEmailValid (input) {
    let isValid = true;

    if (input.value === '') {
        inputError(input, 'Email is required');
        isValid = false;
    } else if (!checkEmailValid(email.value)) {
        inputError(input, 'Email is not valid');
        isValid = false;
    } else {
        inputSuccess(input);
    }

    return isValid;
}

function checkPasswordValid (input) {
    let isValid = true;

    if (input.value === '') {
        inputError(input, );
        isValid = false;
    } else if (input.value.length < 8) {
        inputError(input, 'Password must be 8 characters or longer');
        isValid = false;
    } else {
        inputSuccess(input);
    }

    return isValid;
}

function checkConfirmPasswordValid(input) {
    let isValid = true;

    if (input.value === '') {
        inputError(input, 'Repeat Password is required');
        isValid = false;
    } else if (input.value !== password.value) {
        inputError(input, 'Repeat password is incorrect');
        isValid = false;
    } else {
        inputSuccess(input);
    }

    return isValid;
}

function validateForm() {
    let formValid = true;

    let i = 0;
    while (formValid && i < gender.length) {
        if (gender[i].checked) formValid = false;
        i++;        
    }

    if (!formValid) alert("Must check some option!");
    return formValid;
}


function checkAllInputValues() {
    let isValid = true;

    if (firstName.value === '') {
        inputError(firstName, 'Name is required');
        isValid = false;
    }

    if (lastName.value === '') {
        inputError(lastName, 'Last name is required');
        isValid = false;
    }

    if (username.value === '') {
        inputError(username, 'Username is required');
        isValid = false;
    }

    if (email.value === '') {
        inputError(email, 'Email is required');
        isValid = false;
    }

    if (password.value === '') {
        inputError(password, 'Password is required');
        isValid = false;
    }

    if (confirmPassword.value === '') {
        inputError(confirmPassword, 'Confirm Password is required');
        isValid = false;
    }

    return isValid;
}

function newDateInput (input) {
    let d = new Date();
    let year = d.getFullYear();
    let month = d.getMonth()+1;
    let date = d.getDate();
    if (month < 10) {
        month = '0' + month;
    }

    if (date < 10) {
        date = '0' + date;
    }

    let cDate = year + '-' + month + '-' + date;
    input.value = cDate;

};

username.addEventListener('input', function () {
    checkUserName(username);
})
password.addEventListener('input', function () {
    checkPasswordValid(password);
})
confirmPassword.addEventListener('input', function () {
    checkConfirmPasswordValid(confirmPassword);
})


form.addEventListener('submit', function (event) {
    let isFormValid =
        checkNameData(firstName, 'Name is required') &&
        checkNameData(lastName, 'Last name is required') &&
        checkUserName(username) &&
        checkEmailValid(email) &&
        checkPasswordValid(password) &&
        checkConfirmPasswordValid(confirmPassword)
        // validateForm();

    if (!checkAllInputValues() || !isFormValid) {
        event.preventDefault();
    }
});

submitButton.addEventListener('click', function (event) {
    let isFormValid =
        checkNameData(firstName, 'Name is required') &&
        checkNameData(lastName, 'Last name is required') &&
        checkUserName(username) &&
        checkEmailValid(email) &&
        checkPasswordValid(password) &&
        checkConfirmPasswordValid(confirmPassword)
        // validateForm(); 

    if (!checkAllInputValues() || !isFormValid) {
        event.preventDefault();
        
    }
});
