function clearErrors() {
    errors = document.getElementsByClassName('formerror');
    for (let item of errors) {
        item.innerHTML = "";
    }
}

function seterror(id, error) {
    //sets error inside tag of id 
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;
}

function validateForm() {
    var returnval = true;
    clearErrors();

    //perform validation and if validation fails, set the value of returnval to false
    var username = document.forms['login']["username"].value;
    var password = document.forms['login']["password"].value;

    var userexp = /^[0-9A-Za-z]{6,12}$/;

    if (!userexp.test(username)) {
        seterror("username", "*Enter a valid username with 6 characters");
        returnval = false;
    }


    if (username.length < 6) {
        seterror("username", "*Username should be at least 6 characters");
        returnval = false;
    }

    if (username.length == 0) {
        seterror("username", "*Enter your username");
        returnval = false;
    }


    var passexp = /^(?=.*?[0-9])(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[^0-9A-Za-z]).{6,15}$/;

    if (!passexp.test(password)) {
        seterror("password", "*Enter a valid password ");
        returnval = false;
    }

    if (password.length < 6) {
        seterror("password", "*Password should be at least 6 characters long");
        returnval = false;
    }

    if (password.length == 0) {
        seterror("password", "*Enter your password");
        returnval = false;
    }


    return returnval;
}
