<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST['password'] !== $_POST['confirm_password']) {
            $_SESSION['error_message'] = "Password and Confirm Password do not match. Please try again.";
            header("Location: formRegister.php");
            exit();
        }
        
        $_SESSION['form_data'] = [
            'f_name' => $_POST['f_name'],
            'l_name' => $_POST['l_name'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'confirm_password' => $_POST['confirm_password'],
            'gender' => $_POST['gender'],
            'phone' => $_POST['phone'],
            'date_of_birth' => $_POST['date_of_birth']
        ];
        header("Location: loginPage.php");
        exit();
    };
?>