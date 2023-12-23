<?php
    include "../../connect_db.php";

    $customPositionsData = include "./data.php";

    function updatePositions ($conn, $positionsData) {
        foreach ($positionsData as $position) {
            $name = mysqli_real_escape_string($conn, $position['p_name']);

            $checkSql = "SELECT * FROM positions WHERE p_name = '$name'";
            $checkResult = mysqli_query($conn, $checkSql);

            if (mysqli_num_rows($checkResult) == 0) {
                $insertSql = "INSERT INTO positions (p_name) VALUES ('$name')";
                mysqli_query($conn, $insertSql);

                if (mysqli_errno($conn) != 0) {
                    echo "Error: " . mysqli_error($conn);
                } else {
                    header('Location: ../../../home/home.php');
                    echo "Position already exists" . "<br>";
                } 
            } else {
                header('Location: ../../../home/home.php');
            }
        }
    }

    updatePositions($conn, $customPositionsData);

    mysqli_close($conn);
?>