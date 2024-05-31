<?php

ini_set('display_errors', 1);

session_start();

class CustomerLogin
{
    public $conn;

    public function __construct()
    {
        $servername = "localhost";
        $user = "saignaneswarj";
        $userpassword = "Gnaneswar@2002";
        $databasename = "Project";

        $this->connect($servername, $user, $userpassword, $databasename);
    }

    public function connect($servername, $user, $userpassword, $databasename)
    {
        $this->conn = new mysqli($servername, $user, $userpassword, $databasename);

        if ($this->conn->connect_errno) {
            echo "Failed connect to database " . $this->conn->connect_error;
        } else {
            echo "connected successfully";
        }
    }

    public function __destruct()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM customer WHERE username = '$username' AND password = '$password'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {

            $data = $result->fetch_assoc();

            $_SESSION['id']  =  $data['id'];
            $_SESSION['name'] = $data['cust_name'];

            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            
            header("Location:homeproductdisplay.php");
            
        } else {
            header("Location: customerlogin.php?error_message=Incorrect username or password");
            exit();
        }
    }

    public function postlogindata()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }

        $this->login($username, $password);
    }

}


$customerlogin = new CustomerLogin();
$customerlogin->postlogindata();




?>
