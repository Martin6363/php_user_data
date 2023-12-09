<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $_SESSION['login_data'] = [
        'user_login' => $_GET['user_login'],
        'user_password' => $_GET['user_password']
    ];

    if ($_SESSION['login_data']['user_login'] == $_SESSION['registration_data']['username'] && $_SESSION['login_data']['user_password'] == $_SESSION['registration_data']['password']) {
        header('Location: ../home/home.php');
        exit();
    } else {
        $_SESSION['error_login'] = "Username or password is incorrect";
        header('Location: ./pages/loginPage.php');
        exit();
    }
}
?>
