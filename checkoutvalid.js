function validateForm() {
    var name = document.forms["register"]["name"].value;
    var email = document.forms["register"]["email"].value;
    var street = document.forms["register"]["street"].value;
    var country = document.forms["register"]["country"].value;
    var state = document.forms["register"]["state"].value;
    var city = document.forms["register"]["city"].value;
    var pincode = document.forms["register"]["pincode"].value;
    var mobile = document.forms["register"]["mobile"].value;
    var shippingMethod = document.forms["register"]["shippingMethod"].value;
    var paymentMethod = document.forms["register"]["paymentMethod"].value;

    // Resetting previous error messages
    document.getElementById("nameError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("streetError").innerHTML = "";
    document.getElementById("countryError").innerHTML = "";
    document.getElementById("stateError").innerHTML = "";
    document.getElementById("cityError").innerHTML = "";
    document.getElementById("pincodeError").innerHTML = "";
    document.getElementById("mobileError").innerHTML = "";
    document.getElementById("shippingError").innerHTML = "";
    document.getElementById("paymentError").innerHTML = "";

    var isValid = true;

    // Validate Name
    if (name == "") {
        document.getElementById("nameError").innerHTML = "* Name is required";
        isValid = false;
    }

    // Validate Email
    if (email == "") {
        document.getElementById("emailError").innerHTML = "* Email is required";
        isValid = false;
    }

    // Validate Street
    if (street == "") {
        document.getElementById("streetError").innerHTML = "* Street Address is required";
        isValid = false;
    }

    // Validate Country
    if (country == "") {
        document.getElementById("countryError").innerHTML = "* Country is required";
        isValid = false;
    }

    // Validate State
    if (state == "") {
        document.getElementById("stateError").innerHTML = "* State is required";
        isValid = false;
    }

    // Validate City
    if (city == "") {
        document.getElementById("cityError").innerHTML = "* City is required";
        isValid = false;
    }

    // Validate Pin Code
    if (pincode == "") {
        document.getElementById("pincodeError").innerHTML = "* Pin Code is required";
        isValid = false;
    }

    // Validate Mobile
    if (mobile == "") {
        document.getElementById("mobileError").innerHTML = "* Mobile is required";
        isValid = false;
    }

    // Validate Shipping Method
    if (shippingMethod == "") {
        document.getElementById("shippingError").innerHTML = "* Shipping Method is required";
        isValid = false;
    }

    // Validate Payment Method
    if (paymentMethod == "") {
        document.getElementById("paymentError").innerHTML = "* Payment Method is required";
        isValid = false;
    }

    return isValid;
}