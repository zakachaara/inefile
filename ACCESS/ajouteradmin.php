<?php
include "connexion.php";

$email = "admin@ofood.com";


$password = "adminadmin";
$pass_hashed = password_hash($password, PASSWORD_DEFAULT);

        
$sql = "INSERT INTO admin  VALUES ('$email', '$pass_hashed')";
$result = mysqli_query($con, $sql);
echo "Successfuly! check your database"
?>