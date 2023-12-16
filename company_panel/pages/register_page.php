<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles/register_page.css">
</head>
<body class="bg-dark">
      <div class="wrapper">
        <div class="container d-flex justify-content-center">
          <div class="login-form">
            <?php
                if (isset($_SESSION['error_message']['database_message'])) :
            ?>
                <div class="auto-close alert alert-info" role="alert">
                    <?= $_SESSION['error_message']['database_message'];?>
                </div>
            <?php
                endif;
            ?>
            <h2>Register</h2>
            <form class="form" action="../actions/register.php" method="post">
                <div class="input-container">
                    <input type="text" id="first_name" name="first_name" value="<?= isset($_SESSION['reg_old']['first_name']) ? $_SESSION['reg_old']['first_name'] : '' ?>"/>
                    <label for="first_name">First name</label>
                    <?php if (isset($_SESSION['error_message']['first_name'])) : ?>
                        <span class="text-light error_text"><?= $_SESSION['error_message']['first_name']?></span>
                    <?php endif; ?>
                </div>
                <div class="input-container">
                    <input type="text" id="last_name" name="last_name" value="<?= isset($_SESSION['reg_old']['last_name']) ? $_SESSION['reg_old']['last_name'] : '' ?>"/>
                    <label for="last_name">Last name</label>
                    <?php if (isset($_SESSION['error_message']['last_name'])) : ?>
                        <span class="text-light error_text"><?= $_SESSION['error_message']['last_name']?></span>
                    <?php endif; ?>
                </div>
                <div class="input-container">
                    <input type="email" id="email" name="email" value="<?= isset($_SESSION['reg_old']['email']) ? $_SESSION['reg_old']['email'] : '' ?>"/>
                    <label for="email">Email</label>
                    <?php if (isset($_SESSION['error_message']['email'])) : ?>
                        <span class="text-light error_text"><?= $_SESSION['error_message']['email']?></span>
                    <?php endif; ?>
                </div>
                <div class="input-container select_box">
                    <select class="form-select bg-dark text-light" name="gender" aria-label="Default select example" value="<?= isset($_SESSION['reg_old']['gender']) ? $_SESSION['reg_old']['gender'] : '' ?>">
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                    </select>
                    <div class="input-container d-flex flex-column date_box">
                        <input type="date" id="date_of_birth" name="date_of_birth" class="w-50 p-2" value="<?= isset($_SESSION['reg_old']['date_of_birth']) ? $_SESSION['reg_old']['date_of_birth'] : '' ?>"/> 
                        <?php if (isset($_SESSION['error_message']['date_of_birth'])) : ?>
                            <span class="text-light error_text"><?= $_SESSION['error_message']['date_of_birth']?></span>
                        <?php endif; ?>
                    </div>
                    <div class="input-container w-50 m-0">
                        <input type="phone" id="phone" name="phone_number" class="p-2" value="<?= isset($_SESSION['reg_old']['phone_number']) ? $_SESSION['reg_old']['phone_number'] : '' ?>"/>
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="input-container">
                    <input type="text" id="username" name="username" value="<?= isset($_SESSION['reg_old']['username']) ? $_SESSION['reg_old']['username'] : '' ?>"/>
                    <label for="username">Username</label>
                    <?php if (isset($_SESSION['error_message']['username'])) : ?>
                        <span class="text-light error_text"><?= $_SESSION['error_message']['username']?></span>
                    <?php endif; ?>
                </div>
                <div class="input-container">
                    <input type="password" id="password" name="password" value="<?= isset($_SESSION['reg_old']['password']) ? $_SESSION['reg_old']['password'] : '' ?>"/>
                    <label for="password">Password</label>
                    <?php if (isset($_SESSION['error_message']['password'])) : ?>
                        <span class="text-light error_text"><?= $_SESSION['error_message']['password']?></span>
                    <?php endif; ?>
                </div>
                <div class="input-container">
                    <input type="password" id="confirm_password" name="confirm_password" value="<?= isset($_SESSION['reg_old']['confirm_password']) ? $_SESSION['reg_old']['confirm_password'] : '' ?>"/>
                    <label for="confirm_password">Confirm Password</label>
                    <?php if (isset($_SESSION['error_message']['confirm_password'])) : ?>
                        <span class="text-light error_text"><?= $_SESSION['error_message']['confirm_password']?></span>
                    <?php endif; ?>
                </div>
                <div class="submit-box mt-2">
                    <button type="submit" name="register" class="login-button">Register</button>
                    <a href="login_page.php">Login</a>
                </div>
            </form>
          </div>        
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>