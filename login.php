<?php 

session_start(); 

include "dbconnection.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = $_POST['email'];

    $pass = $_POST['password'];

    if (empty($uname)) {

        header("Location: login.html?error=usernamepasswordrequired");

        exit();

    }else if(empty($pass)){

        header("Location: login.html?error=usernamepasswordrequired");

        exit();

    }else{

        $sql = "SELECT * FROM user_login WHERE Email='$uname' AND Password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['Email'] === $uname && $row['Password'] === $pass) {

                echo "Logged in!";

                $_SESSION['email'] = $row['Email'];


                $_SESSION['id'] = $row['UserID'];

                $_SESSION['logged in'] = 'y';

                header("Location: index.php");

                exit();

            }else{

                header("Location: login.html?error=incorrectusernameorpassword");

                exit();

            }

        }else{

            header("Location: login.html?error=incorrectusernameorpassword");

            exit();

        }

    }

}else{

    header("Location: login.html");

    exit();

}