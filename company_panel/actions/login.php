<?php
    session_start();
    require_once "../db/connect_db.php";


    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $username = isset($_GET['user_login']) ? $_GET['user_login'] : '';
        $password = isset($_GET['user_password']) ? $_GET['user_password'] : '';
        
        $_SESSION['login_value']['username'] = $username;
        $_SESSION['login_value']['password'] = $password;

        $query = "SELECT * FROM users WHERE username='$username' AND user_password='$password'";
        $result = mysqli_query($conn, $query);
    
        if (mysqli_num_rows($result) > 0) {
            mysqli_close($conn);
            header("Location: ../home/home.php");
            exit();
        } else {
            $_SESSION['login_error']['login_failed'] = "Invalid username or password";
            header("Location: ../pages/login_page.php");
            exit();
        }
    }

    mysqli_close($conn);
?>