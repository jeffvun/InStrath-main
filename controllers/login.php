<?php
    session_start();
    require_once("../models/database.php");

    if($_POST['type']==1){
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        global $conn;
        $sql = "SELECT * FROM tbl_admin WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
                //set session
                $_SESSION['id'] = $row['id'];
                $_SESSION['first_name'] = $row['first_name'];
                echo json_encode(array("statusCode"=>200));
            } 
            else {
                echo json_encode(array("statusCode"=>201));
            }
        } 
        else {
            echo json_encode(array("statusCode"=>202));
        }
    }
    else{
        echo json_encode(array("statusCode"=>401));
        echo "<br>";
        echo 'Current PHP version: ' . phpversion();
    }
?>