<?php
    class Employee {

        public function addEmployee ($first_name, $last_name, $email, $dob, $phone, $gender, $country, $company_id, $position_id, $salary)
        {
            include "../db/connect_db.php";

            $company_id_query = "SELECT id FROM companies WHERE id = '$company_id'";
            $company_id_result = mysqli_query($conn, $company_id_query);

            $position_id_query = "SELECT * FROM positions WHERE id = '$position_id'";
            $position_id_result = mysqli_query($conn, $position_id_query);

            if ($company_id_result || $position_id_result) {
                $row_company = mysqli_fetch_assoc($company_id_result);
                $company_id = $row_company['id'];

                $row_position = mysqli_fetch_assoc($position_id_result);
                $position_id = $row_position['id'];
                $sql_position = "SELECT * FROM positions WHERE id = $position_id";
                $sql_position_result = mysqli_query($conn, $sql_position);
                $row_position = mysqli_fetch_assoc($sql_position_result);

                $super_employee_id = null;
                
                if ($row_position['position_name'] === 'director') {
                    print_r($row_position['position_name']);
                    exit();
                        $super_employee_id = $company_id;
                }
                $sql = "INSERT INTO employees (first_name, last_name, email, dob, phone_number, gender, country, create_at, company_id, position_id, super_employee_id)
                VALUES ('$first_name', '$last_name', '$email', '$dob', '$phone', '$gender', '$country', CURRENT_TIMESTAMP, '$company_id', '$position_id', ";
                $sql .= $super_employee_id !== null ? "'$super_employee_id')" : "NULL)";

                if (mysqli_query($conn, $sql)) {
                    $emp_id = mysqli_insert_id($conn);
    
                    $salary_query = "INSERT INTO salaries (emp_id, amount, salary_date, bonus) VALUES ('$emp_id', '$salary', CURRENT_DATE, NULL)";
                    
                    if (mysqli_query($conn, $salary_query)) {
                        $_SESSION['employee_add_message'] = "Employee added successfully!";
                    } else {
                        echo "Error: " . $salary_query . "<br>" . mysqli_error($conn);
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Error fetching company or position data: " . mysqli_error($conn);
            }
    
        }

    }
?>