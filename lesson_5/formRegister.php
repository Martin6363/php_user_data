<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="./style.scss">
</head>
<body>
    <div class="container">
        <h2>Registration</h2>
        <form action="./formData.php" method="post" id="form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="f_name">
                <span class="text"></span>
            </div>
            <div class="form-group">
                <label for="last_name">Last name:</label>
                <input type="text" id="last_name" name="l_name">
                <span class="text"></span>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                <span class="text"></span>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
                <span class="text"></span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <span class="text"></span>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password">
                <span class="text"></span>
            </div>
            <div class="form-group form-gender">
                <label class="gender-label" for="male">Male
                    <input type="radio" id="male" name="gender" value="male">
                </label>
                <label class="gender-label" for="female" >Female
                    <input type="radio" id="female" name="gender" value="female">
                </label>
            </div>
            <div class="phone_and_date_box">
                <div class="phone_box">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Phone number">
                    <span class="text"></span>
                </div>
                <div class="date_box">
                    <label for="date">Date of Birth:</label>
                    <input type="date" id="date" name="date_of_birth">
                    <span class="text"></span>
                </div>
            </div>
            <div class="form-group form_button">
                <button type="submit" id="submit_button">Register</button>
                <a href="./loginPage.php">Login</a>
            </div>

            <?php
                session_start();
                if (isset($_SESSION['error_message'])) {
                    echo '<p class="error_mess">' . $_SESSION['error_message'] . '</p>';
                    unset($_SESSION['error_message']); // Clear the error message from the session
                }
            ?>
        </form>
    </div>
    <script src="./register.js"></script>
</body>
</html>
