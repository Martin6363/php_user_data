<?php
session_start();
unset($_SESSION['error_message']);

function validateName($name, $fieldName) {
    if (empty($name)) {
        $_SESSION['error_message']['first_name'] = ucfirst($fieldName) . " is required."; 
        return false;
    } elseif (!preg_match("/^[a-zA-Z'-]+$/", $name)) {
        $_SESSION['error_message']['first_name'] = ucfirst($fieldName) . " contains invalid characters.";
        return false;
    } else {
        return true;
    }
}

function validateLastName($name, $fieldName) {
    if (empty($name)) {
        $_SESSION['error_message']['last_name'] = ucfirst($fieldName) . " is required.";
        return false;
    } elseif (!preg_match("/^[a-zA-Z'-]+$/", $name)) {
        $_SESSION['error_message']['last_name'] = ucfirst($fieldName) . " contains invalid characters.";
        return false;
    } else {
        return true;
    }
}

function validateEmail($email) {
    if (empty($email)) {
        $_SESSION['error_message']['email'] = "Email is required.";
        return false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message']['email'] = "Invalid email format.";
        return false;
    } else {
        return true;
    }
}

function validatePassword($password) {
    if (trim($password) != '') {
        if (strlen($password) < 8) {
            $_SESSION['error_message']['password'] = "Password must be at least 8 characters long";
            return false;
        }
    } else {
        $_SESSION['error_message']['password'] = "Password is required";
        return false;
    }
    return true;
}

function confirmPasswordsMatch($password, $confirmPassword) {
    if ($password !== $confirmPassword) {
        $_SESSION['error_message']['confirm_password'] = "Password does not match";
        return false;
    } else {
        return true;
    }
}

function dateOfBirth($value) {
    if ($value) {
        if (strtotime($value) > time()) {
            $_SESSION['error_message']['date_of_birth'] = 'Date of Birth cannot be in the future';
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}

function validateUserName ($value) {
    if (trim($value) == '') {
        $_SESSION['error_message']['username'] = "Username is required";
        return false;
    } else {
        return true;
    }
}
?>
