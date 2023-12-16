<?php
require_once "../assets/php/register.php";
$user = new Register();

    if (isset($_POST['action']) && $_POST['action'] == 'register') {
        $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
        $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : ''
        $email = isset($_POST['email']) ? $_POST['email'] : ''
        $gender = isset($_POST['gender']) ? $_POST['gender'] : ''
        $date_of_birth = isset($_POST['date_of_birth']) ? $_POST['date_of_birth'] : ''
        $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : ''
        $address = isset($_POST['address']) ? $_POST['address'] : ''
        $username = isset($_POST['username']) ? $_POST['username'] : ''
        $password = isset($_POST['password']) ? $_POST['password'] : ''

        if ($user->register($first_name, $last_name,
            $email, $date_of_birth, $phone_number, $address, $username, $password)
        ) {
            echo "Register";
        }
    }
?>