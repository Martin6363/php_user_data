<?php
session_start();
include '../home/userData.php';
require '../connectMySql.php';

if (isset($_POST['delete_user'])) {
    if (empty($_SESSION['login_data'])) {
        $_SESSION['message'] = "Some activities will be available after registration";
        header("Location: ../pages/loginPage.php");
        exit();
    } else {
        $user_id = $_POST['delete_user'];

        $query = "DELETE FROM crud WHERE id='$user_id'";
        $query_run = mysqli_query($con, $query);

        if($query_run) {
            $_SESSION['message'] = "User Deleted Successfully";
            header("Location: ../home/home.php");
            exit();
        } else {
            $_SESSION['message'] = "User Not Deleted";
            header("Location: ../home/home.php");
            exit();
        }
    }
}
?>
