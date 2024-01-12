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
?>