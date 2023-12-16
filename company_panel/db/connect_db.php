<?php
    $conn = mysqli_connect('localhost', 'root', '', 'company_office');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error($con));
    }

?>