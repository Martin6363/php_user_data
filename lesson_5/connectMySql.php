<?php
    $con = mysqli_connect('localhost', 'root', '', 'crudOperation');

    if (!$con) {
        die(mysqli_connect_error($con));
    }
?>