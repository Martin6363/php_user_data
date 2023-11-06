<?php
    session_start();
    unset($_SESSION['login_data']);
    header("Location: loginPage.php");
    exit();
?>