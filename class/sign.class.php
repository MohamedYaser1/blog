<?php


class Sign {
    public $full_name;
    public $user_name;
    public $password;

    public function sign_up()  {
        $fullname = $this->full_name;
        $username = $this->user_name;
        $password = $this->password;

        // connection DB
        include("./config/connect.php");
        
        $sql = "INSERT INTO user SET full_name = '$fullname', user_name = '$username', password = '$password'";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            
            $_SESSION["add"] = "User Add Successfully";
    
            header("location:".HOME."index.php");
    
        }else{
    
            $_SESSION["add"] = "Fuiled to Add User";
    
            header("location:".HOME."index.php");
        }

    }
    
    public function sign_in()  {
        $username = $this->user_name;
        $password = $this->password;

        // connection DB
        include("./config/connect.php");
        
        $sql = "SELECT * FROM user WHERE user_name = '$username' AND password = '$password'";
        $res = mysqli_query($conn, $sql);
        
        $count = mysqli_num_rows($res);
        if ($count == 1) {
                
            $_SESSION['user'] = $username;
            
            $_SESSION["available"] = "<div class='success'>Logged In Successfully";

            header("location:".HOME."index.php");

        }else{

            $_SESSION["notavailable"] = "<div class='erorr'>Username Or Password Wrong</div>";

            header("location:".HOME."sign-in.php");
        }

        }
}