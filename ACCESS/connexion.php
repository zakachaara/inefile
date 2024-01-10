<?php
try{
    $con = mysqli_connect("localhost", "root", "", "food");
}catch(Exception $e){
    "Something went Wrong!";
}
?>