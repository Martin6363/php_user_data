<?php
    include '../db/connect_db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $employeeId = $_GET['id'];
        $sql = "SELECT 
            employees.id,
            employees.first_name,
            employees.last_name,
            employees.email,
            employees.dob,
            employees.phone_number,
            employees.gender,
            employees.create_at,
            employees.country,
            companies.name AS company_name,
            companies.type AS company_type,
            positions.p_name AS position_name,
            salaries.amount AS salary_amount
            FROM 
                employees
            INNER JOIN 
                companies ON employees.company_id = companies.id
            INNER JOIN 
                departments ON companies.department_id = departments.id
            INNER JOIN 
                positions ON employees.position_id = positions.id
            INNER JOIN 
                salaries ON salaries.emp_id = employees.id
            WHERE employees.id = '$employeeId'";


        $sql_result = mysqli_query($conn, $sql);

        $employeeData = mysqli_fetch_assoc($sql_result);
    
        header('Content-Type: application/json');
        echo json_encode($employeeData);
        exit;
    }
?>