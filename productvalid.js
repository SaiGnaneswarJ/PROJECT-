function clearErrors() {
    errors = document.getElementsByClassName('formerror');
    for (let item of errors) {
        item.innerHTML = "";
    }
}

function seterror(id, error) {
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;
}

function validateForm() {
    var returnval = true;
    clearErrors();

    var skucode = document.forms['register']["skucode"].value;

    if (skucode.length == 0) {
        seterror("skucode", "*Enter the SKU code");
        returnval = false;
    }

    var pro_name = document.forms['register']["pro_name"].value;

    if (pro_name.length == 0) {
        seterror("pro_name", "*Enter the product name");
        returnval = false;
    }

    var price = document.forms['register']["price"].value;

    if (isNaN(price) || price <= 0) {
        seterror("price", "*Enter a valid positive price");
        returnval = false;
    }

    if (price.length == 0) {
        seterror("price", "*Enter the price");
        returnval = false;
    }

    var image = document.forms['register']["image"].value;

    if (image.length == 0) {
        seterror("image", "*Upload an image");
        returnval = false;
    }

    return returnval;
}
