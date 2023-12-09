<?php
session_start();
unset($_SESSION['error_message']);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $userData = [];

    foreach ($_POST as $key => $dataValue) {
        $userData[$key] = trim(htmlspecialchars($dataValue));
    }
    $_SESSION['registration_data'] = $userData;
    $_SESSION['reg_old'] = $userData;

    $errors = [];
    list($name, $lastName, $username, $email, $password, $confirm_password, $gender, $phone, $dateOfBirth) = array_values($userData);

    if ($password) {
        if ($password != $userData['confirm_password']) {
            $errors['confirm_password'] = 'Password and Confirm Password do not match. Please try again.';
        } else {
            if (strlen($password) < 8) {
                $errors['password'] = 'Password must contain at least 8 characters and above';
            }
        }
    } else {
        $errors['password'] = 'Password is required';
    }
    
    if (!$confirm_password) {
        $errors['confirm_password'] = 'Confirm password is required';
    };

    if (!$name) {
        $errors['f_name'] = 'Name is required';
    }

    if (!$lastName) {
        $errors['l_name'] = 'Last name is required';
    };

    if (!$username) {
        $errors['username'] = 'Username is required';
    };

    if ($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format'; 
        }
    } else {
        $errors['email'] = 'Email is required';
    }

    if (!$phone) {
        $errors['phone'] = 'Phone number is required';
    } 
    // else {
    //     if (!preg_match('/^[0-9]{10}$/', $phone)) {
    //         $errors['phone'] = 'Invalid phone number format';
    //     }
    // }

    if ($dateOfBirth) {
        if (strtotime($dateOfBirth) > time()) {
            $errors['date_of_birth'] = 'Date of Birth cannot be in the future';
        }
    }

    if (!empty($errors)) {
        unset($_SESSION['error_message']);
        $_SESSION['error_message'] = $errors;
        header("Location: ../pages/registerPage.php");
        exit();
    } else {
        unset($_SESSION['error_message']);
        unset($_SESSION['reg_old']);
        header("Location: ../pages/loginPage.php");
        exit();
    }
}
?>
