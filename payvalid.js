function clearErrors() {
    errors = document.getElementsByClassName('formerror');
    for (let item of errors) {
        item.innerHTML = "";
    }
}

function seterror(id, error) {
    // sets error inside the tag with the id 
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;
}

function validateForm() {
    var returnval = true;
    clearErrors();

    var payment = document.forms['pay']["payment"].value;

    var methodExp = /^[A-Za-z\s]+$/;

    if (!methodExp.test(payment)) {
        seterror("payment", "*Enter a valid payment method (only letters and spaces allowed)");
        returnval = false;
    }

    if (payment.length === 0) {
        seterror("payment", "*Enter the payment method");
        returnval = false;
    }

    return returnval;
}
