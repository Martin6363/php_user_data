<?php
    include "../../connect_db.php";

    $customDepartmentData = include "./data.php";

    function updateDepartment ($conn, $departmentData) {
        foreach ($departmentData as $department) {
            $name = mysqli_real_escape_string($conn, $department['department_name']);

            $sql = "SELECT * FROM departments WHERE department_name = '$name'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 0) {
                $insertSql = "INSERT INTO departments (department_name) VALUES ('$name')";
                mysqli_query($conn, $insertSql);

                if (mysqli_errno($conn) != 0) {
                    echo "Error: " . mysqli_error($conn);
                } else {
                    echo "Position already exists" . "<br>";
                    header('Location: ../positions/query.php');
                }
            } else {
                header('Location: ../positions/query.php');
            }
        }
    }

    updateDepartment($conn, $customDepartmentData);

    mysqli_close($conn);
?>