<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="../assets/styles/register.scss">
</head>
<body>
    <div class="container">
        <h2>Registration</h2>
        <form action="../validateSubmit/registerData.php" method="post" id="form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="f_name" value="<?php if(isset($_SESSION['reg_old']['f_name']))
                    echo $_SESSION['reg_old']['f_name'];
                ?>">
                <span class="text">
                    <?php
                        if (isset($_SESSION['error_message']['f_name'])) {
                            echo $_SESSION['error_message']['f_name'];
                        }
                    ?>
                </span> 
            </div>
            <div class="form-group">
                <label for="last_name">Last name:</label>
                <input type="text" id="last_name" name="l_name" value="<?php if(isset($_SESSION['reg_old']['l_name']))
                    echo $_SESSION['reg_old']['l_name'];
                ?>">
                <span class="text">
                    <?php
                        if (isset($_SESSION['error_message']['l_name'])) {
                            echo $_SESSION['error_message']['l_name'];
                        }
                    ?>
                </span> 
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php if(isset($_SESSION['reg_old']['username']))
                    echo $_SESSION['reg_old']['username'];
                ?>">
                <span class="text">
                    <?php
                        if (isset($_SESSION['error_message']['username'])) {
                            echo $_SESSION['error_message']['username'];
                        }
                    ?>
                </span> 
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php if(isset($_SESSION['reg_old']['email']))
                    echo $_SESSION['reg_old']['email'];
                ?>">
                <span class="text">
                    <?php
                        if (isset($_SESSION['error_message']['email'])) {
                            echo $_SESSION['error_message']['email'];
                        }
                    ?>
                </span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php if(isset($_SESSION['reg_old']['password']))
                    echo $_SESSION['reg_old']['password'];
                ?>">
                <span class="text">
                    <?php
                        if (isset($_SESSION['error_message']['password'])) {
                            echo $_SESSION['error_message']['password'];
                        }
                    ?>
                </span>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" value="<?php if(isset($_SESSION['reg_old']['confirm_password']))
                    echo $_SESSION['reg_old']['confirm_password'];
                ?>">
                <span class="text">
                    <?php
                        if (isset($_SESSION['error_message']['confirm_password'])) {
                            echo $_SESSION['error_message']['confirm_password'];
                        }
                    ?>
                </span>
            </div>
            <div class="form-group form-gender">
                <label class="gender-label" for="male">Male
                    <input type="radio" id="male" name="gender">
                </label>
                <label class="gender-label" for="female" >Female
                    <input type="radio" id="female" name="gender">
                </label>
                <label class="gender-label" for="other" >Other
                    <input type="radio" id="other" name="gender" checked>
                </label>
            </div>
            <div class="phone_and_date_box">
                <div class="phone_box">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Phone number" value="<?php if(isset($_SESSION['reg_old']['phone']))
                        echo $_SESSION['reg_old']['phone'];
                    ?>">
                    <span class="text">
                        <?php
                            if (isset($_SESSION['error_message']['phone'])) {
                                echo $_SESSION['error_message']['phone'];
                            }
                        ?>
                    </span> 
                </div>
                <div class="date_box">
                    <label for="date">Date of Birth:</label>
                    <input type="date" id="date" name="date_of_birth" value="<?php if(isset($_SESSION['reg_old']['date_of_birth']))
                        echo $_SESSION['reg_old']['date_of_birth'];
                    ?>">
                    <span class="text">
                        <?php
                            if (isset($_SESSION['error_message']['date_of_birth'])) {
                                echo $_SESSION['error_message']['date_of_birth'];
                            }
                        ?>
                    </span> 
                </div>
            </div>
            <div class="form-group form_button">
                <button type="submit" id="submit_button" name="register">Register</button>
                <a href="./loginPage.php?login<?php unset($_SESSION['error_message']);?>">Login</a>
            </div>
        </form>
    </div>
    <script src="./register.js"></script>
</body>
</html>
