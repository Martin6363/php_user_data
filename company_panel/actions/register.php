<?php
session_start();
require_once "../validation/validate_register.php";
require_once "../db/connect_db.php";

if (isset($_POST['register'])) {
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $date_of_birth = isset($_POST['date_of_birth']) ? $_POST['date_of_birth'] : '';
    $phone = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    $_SESSION['reg_old']['first_name'] = $first_name;
    $_SESSION['reg_old']['last_name'] = $last_name;
    $_SESSION['reg_old']['email'] = $email;
    $_SESSION['reg_old']['gender'] = $gender;
    $_SESSION['reg_old']['date_of_birth'] = $date_of_birth;
    $_SESSION['reg_old']['phone_number'] = $phone;
    $_SESSION['reg_old']['username'] = $username;
    $_SESSION['reg_old']['password'] = $password;
    $_SESSION['reg_old']['confirm_password'] = $confirm_password;

    $check_email_query = "SELECT 'email' FROM users WHERE email='$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        $_SESSION['error_message']['email'] = "Email already exists";
        header("Location: ../pages/register_page.php");
        exit();
    }

    if (
        validateName($first_name, 'First name') === true &&
        validateLastName($last_name, 'Last name') === true &&
        validateEmail($email) === true &&
        validatePassword($password) === true &&
        confirmPasswordsMatch($password, $confirm_password) === true &&
        dateOfBirth($date_of_birth) === true &&
        validateUserName($username)
    ) {
        $query = "INSERT INTO users (first_name, last_name, email, gender, phone_num, born, username, `password`) 
        VALUES ('$first_name', '$last_name', '$email', '$gender', '$phone', '$date_of_birth', '$username', '$password')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['error_message']['database_message'] = "Registration Successfully";
            unset($_SESSION['reg_old']);
            header("Location: ../pages/register_page.php");
            exit();
        } else {
            $_SESSION['error_message']['database_message'] = "Error: " . mysqli_error($conn);
            header("Location: ../pages/register_page.php");
            exit();
        }

        unset($_SESSION['error_message']);
    } else {
        header("Location: ../pages/register_page.php");
        exit();        
    }
}
?>