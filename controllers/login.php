<?php
    session_start();
    require_once("../models/database.php");

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        global $conn;

        $sql = "SELECT * FROM tbl_admin WHERE email='$email' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
                //set session
                $_SESSION['id'] = $row['id'];
                $_SESSION['first_name'] = $row['first_name'];
                $success='success';
                $arrays=array('success'=>'success');
                echo json_encode($arrays);
            } 
            else {
                $arrays=array('success'=>'error');
                echo json_encode($arrays);
            }
        } 
        else {
            $arrays=array('success'=>'error');
            echo json_encode($arrays);
        }
    }
?>