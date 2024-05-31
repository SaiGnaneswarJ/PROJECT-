<?php

ini_set('display_errors', 1);

include 'checkoutcart.php';

?>

<html>
<head>
    <title>ORDER FORM</title>
    <link rel="stylesheet" href="checkout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class = "form1">
        <h3 class = "text-danger">ORDER DETAILS</h3>
        <form  action="checkoutdata.php" name="register" onsubmit="return validateForm()" method="post">

            <div  id="name">
                <label>Name:</label><br>
                <input type="text" name="name"><br><b><span class="formerror" id="nameError"> </span></b>
            </div>

            <div  id="email">
                <label>Email:</label><br>
                <input type="text" name="email" ><br><b><span class="formerror" id="emailError"> </span></b>
            </div>

            <div  id="street">
                <label>Street Adress:</label><br>
                <input type="text" name="street"><br><b><span class="formerror" id="streetError">  </span></b>
            </div>

            <div  id="country">
                <label>Country:</label><br>
                <select name="country">
                    <option ></option>
                    <option >United States</option>
                    <option >Canada</option>
                    <option >United Kingdom</option>
                    <option >India</option>
                </select><br><b><span class="formerror" id="countryError"> </span></b>
            </div>

            <div  id="state">
                <label>State:</label><br>
                <select name="state">
                    <option ></option>
                    <option >California</option>
                    <option >New York</option>
                    <option >Texas</option>
                    <option >Andhra pradesh</option>
                    <option >Telengana</option>
                </select><br><b><span class="formerror" id="stateError"> </span></b>
            </div>

            <div  id="city">
                <label>City:</label><br>
                <input type="text" name="city" ><br><b><span class="formerror" id="cityError"> </span></b>
            </div>

            <div  id="pincode">
                <label>Pin Code:</label><br>
                <input type="text" name="pincode" ><br><b><span class="formerror" id="pincodeError"> </span></b>
            </div>

            <div  id="mobile">
                <label>Mobile:</label><br>
                <input type="text" name="mobile" ><br><b><span class="formerror" id="mobileError"> </span></b>
            </div><br>

            <div  id="shipping">
                <h6>SHIPPING METHOD</h6>
                <select  name="shippingMethod">
                    <option ></option>
                    <option value="FedEx">FedEx</option>
                    <option value="FreeDelivery">Free delivery</option>
                </select>
                <br><b><span class="formerror" id="shippingError"> </span></b>
            </div><br>

            <div  id="payment">
                <h6>PAYMENT METHOD</h6>
                <select name="paymentMethod">
                    <option ></option>
                    <option value="COD">COD</option>
                    <option value="CheckCashOrder">CHECK/CASH ORDER</option>
                </select>
                <br><b><span class="formerror" id="paymentError"></span></b>
            </div><br><br>

            <button class="btn btn-warning mt-3 button" type="submit" name="checkout">Place Order</button>

        </form>

    </div>

    <script src = "checkoutvalid.js"></script>
</body>

</html>

