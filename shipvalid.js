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

    // perform validation and if validation fails, set the value of returnval to false
    var shippingmethod = document.forms['register']["shippingmethod"].value;
    var price = document.forms['register']["price"].value;

    var methodExp = /^[A-Za-z\s]+$/; // Only letters and spaces allowed
    var priceExp = /^\d+(\.\d{1,2})?$/; // Numeric value with up to two decimal places

    if (!methodExp.test(shippingmethod)) {
        seterror("shipname", "*Enter a valid shipping method");
        returnval = false;
    }

    if (shippingmethod.length === 0) {
        seterror("shipname", "*Enter the shipping method");
        returnval = false;
    }

    if (!priceExp.test(price)) {
        seterror("price", "*Enter a valid price");
        returnval = false;
    }

    if (price.length === 0) {
        seterror("price", "*Enter the price");
        returnval = false;
    }

    return returnval;
}