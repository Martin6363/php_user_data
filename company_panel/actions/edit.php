<?php
include '../db/connect_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $employeeId = $_POST['id'];

    $query = "SELECT 
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

    $result = mysqli_query($conn, $query);
    $employeeData = mysqli_fetch_assoc($result);

    header('Content-Type: application/json');
    echo json_encode($employeeData);
    exit;
}

if (isset($_POST['save'])) {
    $employeeId = isset($_POST['update_id']) ? $_POST['update_id'] : '';
    
    $first_name = isset($_POST['name']) ? $_POST['name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $salary = isset($_POST['salary']) ? $_POST['salary'] : '';

    $sql = "UPDATE employees SET first_name = '$first_name', last_name = '$last_name', email = '$email', dob = '$dob', phone_number = '$phone', 
            gender = '$gender'
            WHERE id = '$employeeId'";
    $sql_result = mysqli_query($conn, $sql);

    $updateSalaryQuery = "UPDATE salaries SET amount = '$salary' WHERE emp_id = '$employeeId'";
    $updateSalaryResult = mysqli_query($conn, $updateSalaryQuery);

    if ($sql_result && $updateSalaryResult) {
        header('Location: ../home/home.php');
        exit;
    } else {
        echo "Error updating employee data: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
