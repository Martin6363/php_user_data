<?php
    include "../db/connect_db.php";

    if (isset($_POST['create'])) {
        $first_name = mysqli_real_escape_string($conn, $_POST['name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $company_id = mysqli_real_escape_string($conn, $_POST['company']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $position_id = mysqli_real_escape_string($conn, $_POST['position']);
        $salary = mysqli_real_escape_string($conn, $_POST['salary']);
        $director_id = $_POST['director'];

        $sql = "INSERT INTO employees (first_name, last_name, email, dob, phone_number, gender, country, company_id, position_id, super_visor_id) 
                VALUES ('$first_name', '$last_name', '$email', '$dob', '$phone', '$gender', '$country', '$company_id', '$position_id', '$director_id')";

        if (mysqli_query($conn, $sql)) {
            $employee_id = mysqli_insert_id($conn);

            $insertSalaryQuery = "INSERT INTO salaries (emp_id, amount, hire_date) 
                                VALUES ('$employee_id', '$salary', CURRENT_DATE)";

            if (mysqli_query($conn, $insertSalaryQuery)) {
                $_SESSION['add_message'] = "Employee added successfully!";
                header('Location: ../home/home.php');
            } else {
                $_SESSION['add_message'] = "Error inserting salary: " . mysqli_error($conn);
                header('Location: ../home/home.php');
            }
        } else {
            $_SESSION['add_message'] = "Error: " . mysqli_error($conn);
            header('Location: ../home/home.php');
        }

        mysqli_close($conn);
    }
?>
