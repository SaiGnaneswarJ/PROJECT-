function clearErrors(){
    errors = document.getElementsByClassName('formerror');
    for(let item of errors)
    {
        item.innerHTML = "";
    }
}

function seterror(id, error){

    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;
}

function validateForm() {
    var returnval = true;

    var cust_name = document.forms['register']['cust_name'].value;
    var nameexp = /^[A-Za-z]{1,30}$/; // Allows 1-30 letters

    if (!nameexp.test(cust_name)) {
        seterror("cust_name", "*Enter a valid name with 1-30 letters");
        returnval = false;
    }

    if (cust_name.length == 0){
        seterror("cust_name", "*Enter the customer name");
        returnval = false;
    }

    var email = document.forms['register']['email'].value;
    var emailexp = /^[^\s@]+@[^\s@]+\.[^\s@]{2,20}$/;

    if (!emailexp.test(email)) {
        seterror("email", "*Enter a valid email");
        returnval = false;
    }

    if (email.length == 0){
        seterror("email", "*Enter the email");
        returnval = false;
    }

    var mobile = document.forms['register']['mobile'].value;
    var mobileexp = /^[0-9]{10}$/;

    if (!mobileexp.test(mobile)) {
        seterror("mobile", "*Enter a valid 10-digit mobile number");
        returnval = false;
    }

    if (mobile.length == 0){
        seterror("mobile", "*Enter the mobile number");
        returnval = false;
    }

    var address = document.forms['register']['address'].value;

    if (address.length == 0){
        seterror("address", "*Enter the address");
        returnval = false;
    }

    var age = document.forms['register']['age'].value;

    if (isNaN(age)) {
        seterror("age", "*Enter a valid age");
        returnval = false;
    }

    if (age.length == 0) {
        seterror("age", "*Enter the age");
        returnval = false;
    }

    var gender = document.forms['register']['gender'].value;

    if (gender.length == 0) {
        seterror("gender", "*Select the gender");
        returnval = false;
    }

    var username = document.forms['register']['username'].value;

    if (username.length < 6){
        seterror("username", "*Length of name is too short");
        returnval = false;
    }

    if (username.length == 0){
        seterror("username", "*Enter your name");
        returnval = false;
    }

    var password = document.forms['register']['password'].value;
    var passexp = /^(?=.*?[0-9])(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[^0-9A-Za-z]).{6,15}$/;

    if (!passexp.test(password)) {
        seterror("password", "*password should contain capital letter,small letter,number,special character");
        returnval = false;
    }

    if (password.length < 6){
        seterror("password", "*Password should be atleast 6 characters long!");
        returnval = false;
    }

    if (password.length == 0){
        seterror("password", "*Create the password");
        returnval = false;
    }


    return returnval;
}

