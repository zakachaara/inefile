<?php
include "connexion.php";
include "../CMD/log.php";
session_start();
if (isset($_POST["submit"])) {
    if (isset($_POST["username"], $_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM client WHERE username='$user' LIMIT 1";
        $result = mysqli_query($con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);
                $hash = $data["password"];
                if (password_verify($pass, $hash)) {


                    $_SESSION['username'] = $data['username'];

                    
                    header("location:../CMD/index.php"); 
                    die;
                } else {
                    header("location:../CMD/log.php");
                    $_SESSION["state"] = "Incorrect username OR password";
                }
            } else {
                header("location:../CMD/log.php");
                $_SESSION["state"] = "Incorrect username OR password";
            }
        }

    }
}





?>