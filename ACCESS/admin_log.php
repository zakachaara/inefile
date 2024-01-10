<?php
include "connexion.php";
include "../CMD/accueil.php";
session_start();
if (isset($_POST["submit"])) {
    if (isset($_POST["email"], $_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $user = $_POST['email'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM admin WHERE email='$user' LIMIT 1";
        $result = mysqli_query($con, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);
                $hash = $data["password"];
                if (password_verify($pass, $hash)) {


                    $_SESSION['email'] = $data['email'];

                    
                    header("location:../ADMIN_VISUAL/adminis.php"); 
                    die;
                } else {
                    header("location:../CMD/accueil.php");
                    $_SESSION["state"] = "Incorrect email OR password";
                }
            } else {
                header("location:../CMD/accueil.php");
                $_SESSION["state"] = "Incorrect email OR password";
            }
        }

    }
}





?>