<?php
    $_SESSION=array();
    session_destroy();
    header('/index.php');
?>