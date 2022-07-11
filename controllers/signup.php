<?php
    require_once("../models/database.php");

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO tbl_admin(first_name, last_name, email, password, country, phone) VALUES ('$fname', '$lname','$email','$password','$country', '$phone' )";

    $result=mysqli_query($conn,$sql);
    if($result){
        echo "done"; // for ajax manipulation
    }
    else{
        echo "error";
    }   
?>