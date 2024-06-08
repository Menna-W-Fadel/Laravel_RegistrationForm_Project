
var p_fullname = true;
var p_username = true;
var p_email = true;
var p_password = true;
var p_confirm_password = true;
var p_phone = true;
var p_address = true;
var p_image = true;
var p_birthday = true;

function validateFullName() {
    var fullNameInput = document.forms["registrationForm"]["full-name"];
    var fullNameErrorEmpty = document.getElementById("fnameErrEmpty");
    var fullNameErrorL_WS = document.getElementById("fnameErr");
    var namePattern = /^[a-zA-Z ]*$/;
    if (fullNameInput.value === "") {
        p_fullname = false;
        fullNameErrorL_WS.classList.add('hidden');
        fullNameErrorEmpty.classList.remove('hidden');
    } else if (!fullNameInput.value.match(namePattern)) {
        p_fullname = false;
        fullNameErrorEmpty.classList.add('hidden');
        fullNameErrorL_WS.classList.remove('hidden');
    } else {
        p_fullname = true;
        fullNameErrorEmpty.classList.add('hidden');
        fullNameErrorL_WS.classList.add('hidden');
    }
}

function validateImageRequired() {
    const fileInput = document.forms["registrationForm"]["image"];
    var imageErr = document.getElementById('imageErr');
    if (fileInput.files.length === 0) {
        p_image = false;
        imageErr.classList.remove('hidden');
    } else {
        p_image = true;
        imageErr.classList.add('hidden');
    }
}

function validateUserName() {
    var userNameInput = document.forms["registrationForm"]["user-name"];
    var userNameError = document.getElementById("unameErr");
    if (userNameInput.value === "") {
        p_username = false;
        userNameError.classList.remove('hidden');
    } else {
        p_username = true;
        userNameError.classList.add('hidden');
    }
}

function validateBirthday() {
    var birthdayInput = document.forms["registrationForm"]["birthday"];
    var birthdayError = document.getElementById("birthdayErr");
    if (birthdayInput.value === "") {
        p_birthday = false;
        birthdayError.classList.remove('hidden');
    } else {
        p_birthday = true;
        birthdayError.classList.add('hidden');
    }
}

function validateEmail() {
    var emailInput = document.forms["registrationForm"]["email"];
    var emailErrorEmpty = document.getElementById("emailErrEmpty");
    var emailErrorFormat = document.getElementById("emailErr");
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (emailInput.value === "") {
        p_email = false;
        emailErrorFormat.classList.add('hidden');
        emailErrorEmpty.classList.remove('hidden');
    } else if (!emailInput.value.match(emailPattern)) {
        p_email = false;
        emailErrorEmpty.classList.add('hidden');
        emailErrorFormat.classList.remove('hidden');
    } else {
        p_email = true;
        emailErrorEmpty.classList.add('hidden');
        emailErrorFormat.classList.add('hidden');
    }
}

function validatePhone() {
    var phoneInput = document.forms["registrationForm"]["phone"];
    var phoneError = document.getElementById("phoneErr");
    if (phoneInput.value === "") {
        p_phone = false;
        phoneError.classList.remove('hidden');
    } else {
        p_phone = true;
        phoneError.classList.add('hidden');
    }
}

function validateAddress() {
    var addressInput = document.forms["registrationForm"]["address"];
    var addressError = document.getElementById("addressErr");
    if (addressInput.value === "") {
        p_address = false;
        addressError.classList.remove('hidden');
    } else {
        p_address = true;
        addressError.classList.add('hidden');
    }
}

function validatePassword() {
    var passwordInput = document.forms["registrationForm"]["password"];
    var passwordErrorEmpty = document.getElementById("passwordErrEmpty");
    var passwordErrorStrong = document.getElementById("passwordErr");
    var pattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;

    if (passwordInput.value === "") {
        p_password = false;
        passwordErrorStrong.classList.add('hidden');
        passwordErrorEmpty.classList.remove('hidden');
    } else if (!passwordInput.value.match(pattern)) {
        p_password = false;
        passwordErrorEmpty.classList.add('hidden');
        passwordErrorStrong.classList.remove('hidden');
    } else {
        p_password = true;
        passwordErrorStrong.classList.add('hidden');
        passwordErrorEmpty.classList.add('hidden');
    }
}

function validatePasswordConfirmation() {
    var passwordInput = document.forms["registrationForm"]["password"];
    var passwordConfirmationInput = document.forms["registrationForm"]["password-confirmation"];
    var passwordConfirmationErrorEmpty = document.getElementById("password2ErrEmpty");
    var passwordConfirmationErrorMatch = document.getElementById("password2Err");

    if (passwordConfirmationInput.value === "") {
        p_confirm_password = false;
        passwordConfirmationErrorMatch.classList.add('hidden');
        passwordConfirmationErrorEmpty.classList.remove('hidden');
    } else if (passwordConfirmationInput.value !== passwordInput.value) {
        p_confirm_password = false;
        passwordConfirmationErrorEmpty.classList.add('hidden');
        passwordConfirmationErrorMatch.classList.remove('hidden');
    } else {
        p_confirm_password = true;
        passwordConfirmationErrorEmpty.classList.add('hidden');
        passwordConfirmationErrorMatch.classList.add('hidden');
    }
}

function getYear() {
    const birthInput = document.getElementsByName("birthday")[0].value;
    const birthdate = new Date(birthInput);
    const birthYear = birthdate.getFullYear();
    document.getElementById("year").innerHTML = birthYear;
}

function validateForm() {
    validateFullName();
    validateUserName();
    validateBirthday();
    validateEmail();
    validatePhone();
    validateAddress();
    validatePassword();
    validatePasswordConfirmation();
    validateImageRequired();

    if (p_address && p_birthday && p_confirm_password && p_email
        && p_fullname && p_image && p_password && p_phone && p_username) {
            return true;
    }
    else{
        return false;
    }
}

function includeApiPage() {
    // var data=new FormData();
    // data.append('TopMovies','true');//add TopMovies parameter to call apiController file
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            var response = JSON.parse(this.responseText);

            const birthInput = document.getElementsByName("birthday")[0].value;
            const birthdate = new Date(birthInput);
            const birthYear = birthdate.getFullYear();
            document.getElementById("topMovies").innerHTML = "";

            response.forEach(element => {
                //compare between given year and movies published year
                if (element["year"] == birthYear) {
                    const name = element["title"];
                    const description = element["description"];
                    const poster = element["image"];
                    const movie = `<li><img src="${poster}" style=" width: 250px; height:250px;" ><h4>${name}</h4><h6>${description}</h6></li>`;
                    const newDiv = document.createElement("div");
                    document.getElementById("topMovies").appendChild(newDiv);
                    newDiv.innerHTML = movie;
                }
            });
        }
    };
    xhttp.open("GET", "/get-movies", true);
    xhttp.send();
}

