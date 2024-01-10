<?php
include "../ACCESS/connexion.php";
include "adminis.php";
session_start();
if (isset($_POST['submit'])) {
    if (isset($_POST['id'], $_POST['state'], $_POST['prix'])) {
        $cmd = $_POST['id'];
        $state = $_POST['state'];
        $prix = $_POST['prix'];


        
        $sql = "UPDATE reservation SET state = '$state', prix = '$prix' WHERE id = '$cmd'";

        $result = mysqli_query($con, $sql);
        if ($result) {
            $_SESSION["state"] = "update successfully";
            header("location: adminis.php");
        } else {
            $_SESSION['state'] = "id Already used!";
        }
    }
}