<?php
    session_start();
    unset($_SESSION['error_message']);

    function validateImage($image) {
        if ($image['error'] === UPLOAD_ERR_OK) {
            if ($image['size'] < 2000000) {
                $allowed_types = ["image/png", "image/jpeg", "image/jpg"];
                if (in_array($image['type'], $allowed_types)) {
                    return true;
                } else {
                    return "Image type must be PNG, JPG, JPEG.";
                }
            } else {
                return "Image must not exceed 2 mb.";
            }
        } else {
            return "Image upload failed.";
        }
    }
    
    function validateName($name, $fieldName) {
        if (empty($name)) {
            $_SESSION['error_message']['first_name'] = ucfirst($fieldName) . " is required."; 
        } elseif (!preg_match("/^[a-zA-Z'-]+$/", $name)) {
            $_SESSION['error_message']['first_name'] = ucfirst($fieldName) . " contains invalid characters.";
        } else {
            return true;
        }
        return false;
    }

    function validateLastName($name, $fieldName) {
        if (empty($name)) {
            $_SESSION['error_message']['last_name'] = ucfirst($fieldName) . " is required.";
        } elseif (!preg_match("/^[a-zA-Z'-]+$/", $name)) {
            $_SESSION['error_message']['last_name'] = ucfirst($fieldName) . " contains invalid characters.";
        } else {
            return true;
        }
        return false;
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
?>