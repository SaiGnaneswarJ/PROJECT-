<html>
<head>
    <title>CUSTOMER DETAILS</title>
    <link rel="stylesheet" href="customer.css">  
</head>
<body>
    <?php
        if (isset($_GET['success_message'])) {
           echo '<p class="success">' . $_GET['success_message'] . '</p>';
        }

        if (isset($_GET['error_message'])) {
            echo '<p class="error">' . $_GET['error_message'] . '</p>';
        }
    ?>
    <a href="home.php" style = "float:right"><button style = " height:30px;width:80px">Back</button></a>
    <h1>CUSTOMER DETAILS</h1>
      
    <form action ="customerdata.php" name="register" onsubmit="return validateForm()" method="post">
        <div class="formdesign" id="cust_name">
            <label >Customer Name:</label> <br>
            <input type="text" name="cust_name" ><br><b><span class="formerror"> </span></b>
        </div>
        <div class="formdesign" id="email">
            <label > Email:</label><br>
            <input type="text" name="email" ><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="mobile">
            <label > Mobile:</label>  <br>
            <input type="tel" name="mobile" ><br><b><span class="formerror"></span></b>
        </div>

        <div class="formdesign" id="address">
            <label >Address:</label> <br>
            <input type="text" name="address" ><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="age">
            <label>Age:</label><br>
            <input type="number" name="age"><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="gender">
            <label id = "label">Gender:</label><br>
            <select class ="gender" name="gender">
                <option ></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select><br><b><span class="formerror"> </span></b>
        </div>
        <div class="formdesign" id="username">
            <label>USERNAME:</label><br>
            <input type="text" name="username"><br><b><span class="formerror"> </span></b>
        </div>
        <div class="formdesign" id="password">
            <label>PASSWORD:</label><br>
            <input type="password" name="password"><br><b><span class="formerror"> </span></b>
        </div><br>
        <input class="but" type="submit" value="Submit">
        <button class="but"><a href="customerform.php">Reset</a></button>
    </form>


    <script src="customerformvalid.js"></script>
</body>
</html>
