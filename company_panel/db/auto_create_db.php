<?php
    $create_db = file_get_contents('../db/create_db.sql');

    $conn = mysqli_connect('localhost', 'root', '');
    if (!$conn) {
        die('Error db' . mysqli_connect_error());
    }

    $sqlResult = mysqli_multi_query($conn, $create_db);
    if (!$sqlResult) {
        die('Error creating database: ' . mysqli_error($conn));
    }

    // mysqli_close($conn);
?>