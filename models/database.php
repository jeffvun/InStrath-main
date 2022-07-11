<?php
    $localhost="localhost";
    $username="root";
    $password="";
    $db_name="db_instrath";
    //Connect
    $conn=mysqli_connect($localhost, $username, $password, $db_name);
    if (mysqli_connect_errno()) {
        die("Database Connection Failed: ".mysqli_connect_error());
    } else {
        return $conn;
    }
?>