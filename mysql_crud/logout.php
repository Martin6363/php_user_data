<?php
    session_start();
    unset($_SESSION['login_data']);
    header("Location: ./pages/loginPage.php");
    exit();
?>