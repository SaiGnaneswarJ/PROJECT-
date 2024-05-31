<html>
<head>
    <title>LOGIN FORM</title>
    <link rel="stylesheet" href="   color.css">  
</head>

<body>
    <h1>Login</h1>
    <form action ="logindata.php" name="login" onsubmit="return validateForm()" method="post">
        <div class="formdesign" id="username">
            <label >USERNAME:</label> <br>
            <input type="text" name="username" ><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="password">
            <label > PASSWORD:</label>  <br>
            <input type="password" name="password" ><br><b><span class="formerror"></span></b>
        </div>

        <input class="but" type="submit" value="Submit"><br><br>
        <a href="register.php">Register Here</a>

    </form>
    <?php

    if (isset($_GET['error_message'])) {
        echo '<p class="error">' . $_GET['error_message'] . '</p>';
    }
    ?>
</body>
<script src="loginvalid.js"></script>

</html>