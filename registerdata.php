<?php

ini_set('display_errors',1);

class Register{


    public $conn;

    public function __construct()
    {
        $servername = "localhost";
        $user = "saignaneswarj";
        $userpassword = "Gnaneswar@2002";
        $databasename = "Project";

        $this->connect($servername,$user,$userpassword,$databasename);
    }

    public function connect($servername,$user,$userpassword,$databasename)
    {
        $this->conn = new mysqli($servername,$user,$userpassword,$databasename);

        if($this->conn->connect_errno)
        {
            echo "Failed connect to database " . $this->conn -> connect_error;
        }
        else{
            echo "connected successfully";
        }
    }

    public function __destruct()
    {
        if($this->conn)
        {
            $this->conn-> close();
        }
    }

    public function checkemail($email)
    {
        $sql = "SELECT count(*) as count FROM Logindata  WHERE  email = '$email'";

        $result = $this->conn->query($sql);

        if($result->num_rows > 0)
        {
            $check  = $result->fetch_assoc();
            return $check['count'] > 0;
        }

        return false;
    }

    public function storedata($username,$fname,$lname,$email,$password)
    {
        if($this->checkemail($email))
        {
            header("Location: register.php?error_message=Email already exists enter the correct email");
            exit();
        }
        else
        {
            $query = "INSERT INTO Logindata(username,fname,lname,email,password) VALUES('$username','$fname','$lname','$email','$password')";

            if($this->conn->query($query) === TRUE)
            {   
                header("Location:login.php");
            }
            else
            {
                header("Location: register.php?error_message=Filed to enter the data");
                exit();
            }
        }

    }

    public function postdata()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $username = $_POST['username'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        }

        $this->storedata($username,$fname,$lname,$email,$password);
    }

}

$register = new Register();
$register->postdata();



?>




