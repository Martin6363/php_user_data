<?php
    function checkDatabase() {
      $conn = mysqli_connect('localhost', 'root', '');
      if (!$conn) {
          die('Error connecting to the database: ' . mysqli_connect_error());
      }

      $dbCheckQuery = mysqli_query($conn, 'SHOW DATABASES LIKE \'company_office\'');

      if (!$dbCheckQuery) {
          die('Error checking for database: ' . mysqli_error($conn));
      }
     
      $dbExists = mysqli_num_rows($dbCheckQuery) > 0;

      if (!$dbExists) {
        include('../db/auto_create_db.php');
      }
      mysqli_close($conn);
    }

    checkDatabase();

    
  session_start();

  if (isset($_SESSION['error_message']) || isset($_SESSION['reg_old'])) {
    unset($_SESSION['error_message']);
    unset($_SESSION['reg_old']);
  }

  if (isset($_SESSION['login_value'])) {
    unset($_SESSION['login_value']);
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles/login_page.css">
</head>
<body class="bg-dark">
  <div class="wrapper">
    <div class="container d-flex justify-content-center">
      <div class="login-form">
        <div class="logo_box">
          <img src="../assets/images/logo.png" alt="">
        </div>
            <h2>Login</h2>
            <form class="form" action="../actions/login.php" method="get">
                <div class="input-container">
                    <input type="text" id="username" name="user_login" value="<?= isset($_SESSION['login_value']['username']) ? $_SESSION['login_value']['username'] : ''?>" required>
                    <label for="username">Username</label>
                </div>
                <div class="input-container">
                    <input type="password" id="password" name="user_password" value="<?= isset($_SESSION['login_value']['password']) ? $_SESSION['login_value']['password'] : ''?>" required>
                    <label for="password">Password</label>
                </div>
                <div class="submit-box">
                    <button class="login-button">Login</button>
                    <a href="register_page.php">Register</a>
                </div>

                <?php
                if (isset($_SESSION['login_error']['login_failed'])) :
                ?>
                  <div class="auto-close alert alert-danger" role="alert">
                    <?= $_SESSION['login_error']['login_failed'];?>
                  </div>
                <?php 
                  unset($_SESSION['login_error']['login_failed']);
                  endif;
                ?>
            </form>
      </div>        
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>