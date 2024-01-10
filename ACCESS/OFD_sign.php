<?php
include "connexion.php";
include "../CMD/sign.php";
session_start();
if (isset($_POST['submit'])) {
    if (isset($_POST['username'], $_POST['name'], $_POST['email'], $_POST['password'])) {
        $user = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];


        $password = $_POST['password'];
        $pass_hashed = password_hash($password, PASSWORD_DEFAULT);

        
        $sql = "INSERT INTO client  VALUES ('$user', '$name', '$email', '$pass_hashed')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $_SESSION["state"] = "Sing up successfully";
            header("location: ../CMD/sign.php");
        } else {
            $_SESSION['state'] = "Username Already used!";
        }
    }
}





?>