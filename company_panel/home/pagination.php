<?php
    include "../db/connect_db.php";

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $num_per_page = 5;
    $start_from = ($page - 1) * $num_per_page;

    $query = "SELECT * FROM employees";
    $query_result = mysqli_query($conn, $query);
    $number_of_results = mysqli_num_rows($query_result);
    $total_pages = ceil($number_of_results / $num_per_page);

    $sql = "SELECT 
        employees.id,
        employees.first_name,
        employees.last_name,
        employees.email,
        employees.dob,
        employees.create_at,
        companies.name AS company_name,
        companies.type AS company_type,
        positions.p_name AS position_name,
        companies.name AS company_name
        FROM 
            employees
        INNER JOIN 
            companies ON employees.company_id = companies.id
        INNER JOIN 
            departments ON companies.department_id = departments.id
        INNER JOIN 
            positions ON employees.position_id = positions.id
        LIMIT $start_from, $num_per_page";

    $sql_result = mysqli_query($conn, $sql);
?>