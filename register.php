<html>
<head>
    <title>REGISTRATION FORM</title>
    <link rel="stylesheet" href="color.css">  
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
    <h1>Registration</h1>
    <form action ="registerdata.php" name="register" onsubmit="return validateForm()" method="post">
        <div class="formdesign" id="username">
            <label >UserName:</label> <br>
            <input type="text" name="username" ><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="fname">
            <label >  First Name:</label><br>
            <input type="text" name="fname" ><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="lname">
            <label >  Last Name:</label><br>
            <input type="text" name="lname" ><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="email">
            <label >  Email:</label><br>
            <input type="text" name="email" ><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="password">
            <label > Password:</label>  <br>
            <input type="password" name="password" ><br><b><span class="formerror"></span></b>
        </div>

        <div class="formdesign" id="confirmpassword">
            <label >Confirm Password: </label> <br>
            <input type="password" name="confirmpassword" ><br><b><span class="formerror"></span></b>
        </div>

        <input class="but" type="submit" value="Submit">
        <button class="but"><a href="register.php">Reload</a></button><br><br>
        <a href="login.php">clickhere ? login</a>



    </form>
</body>
<script src="registervalid.js"></script>

</html>