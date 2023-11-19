<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login Form</title>
</head>
<body class="bg-dark">
    <div>
        <div class="login-form">
            <?php include('../message/createMessage.php')?>
            <h2>Login</h2>
            <a class="web_site_link" href="../home/home.php">← Go to Web Site Demo</a>
            <form class="form" action="../validateSubmit/loginData.php" method="get">
                <div class="input-container">
                    <input type="text" id="username" name="user_login" required>
                    <label for="username">Username</label>
                </div>
                <div class="input-container">
                    <input type="password" id="password" name="user_password" required>
                    <label for="password">Password</label>
                </div>
                <div class="submit-box">
                    <button class="login-button">Login</button>
                    <a href="./registerPage.php">Register</a>
                </div>

                <?php
                    if (isset($_SESSION['error_login'])) {
                        echo '<p class="error_mess">' . $_SESSION['error_login'] . '</p>';
                        unset($_SESSION['error_login']);
                    }
                ?>
            </form>
        </div>
    </div>
<?php include("../includes/footer.php")?>
