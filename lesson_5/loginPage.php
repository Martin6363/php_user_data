<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login.css">
    <title>Login Form</title>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Login</h2>
            <a class="web_site_link" href="../lesson_4/index.php">← Go to Web Site Demo</a>
            <form class="form" action="./loginData.php" method="get">
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
                    <a href="./formRegister.php">Register</a>
                </div>

                <?php
                    session_start();
                    if (isset($_SESSION['error_login'])) {
                        echo '<p class="error_mess">' . $_SESSION['error_login'] . '</p>';
                        unset($_SESSION['error_login']);
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
