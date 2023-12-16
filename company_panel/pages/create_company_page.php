<?php
session_start(); 
include "../db/connect_db.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $company_type = mysqli_real_escape_string($conn, $_POST['company_type']);
    $department = $_POST['department'];
    $company_description = mysqli_real_escape_string($conn, $_POST['company_description']);

    $department_id_query = "SELECT id FROM departments WHERE id = '$department'";
    $department_id_result = mysqli_query($conn, $department_id_query);

    if ($department_id_result) {
        $row = mysqli_fetch_assoc($department_id_result);
        $department_id = $row['id'];

        $sql = "INSERT INTO companies (company_name, company_type, company_description, department_id)
        VALUES ('$company_name', '$company_type', '$company_description', '$department_id')"; 

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Company added successfully!')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error fetching department ID: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles/add_employee.css">
    <link rel="stylesheet" href="../assets/styles/home.css">
</head>
<body class="bg-dark ">
    <header class="header w-100">
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="nav_item_box d-inline">
                        <a class="navbar-brand" href="../home/home.php">Company</a>
                        <ul class="navbar-nav d-flex flex-row nav_ul">
                            <li class="nav-item">
                                <a class="nav-link active nav_link_hover" aria-current="page" href="../home/home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="../pages/add_employee_page.php">Add Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="../pages/view_employee_page.php">View Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="#">Salary Table</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="#">Departments</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit" disabled>Search</button>
                        </form>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item mt-3">
                                <a class="nav-link active nav_link_hover" aria-current="page" href="../home/home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="../pages/add_employee_page.php">Add Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="../pages/view_employee_page.php">View Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="#">Salary Table</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="#">Departments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="../pages/login_page.php"><?= isset($_SESSION['login_value']) ? 'Logout' : 'Login'?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    </header>
    <div class="wrapper">
        <div class="container bg-black-50 border w-75 Larger shadow bg-light p-3">
            <form action="" method="post">
                <p class="lead text-center text-black display-6">Create Company</p>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="company_name" placeholder="name@example.com">
                    <label for="floatingInput">Company Name</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingInput" name="company_type">
                        <option value="IT company" selected>IT company</option>
                        <option value="Construction company">Construction company</option>
                    </select>
                    <label for="floatingInput">Company Type</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingInput" name="department">
                        <?php
                            $department_sql = "SELECT * FROM departments";
                            $department_sql_result = mysqli_query($conn, $department_sql);
                            if (mysqli_num_rows($department_sql_result) > 0) :
                                foreach($department_sql_result as $value) :
                        ?>
                            <option value="<?= $value['id']?>" selected><?= $value['department_name']?></option>
                        <?php
                            endforeach;
                            endif;
                            mysqli_close($conn);
                        ?>
                    </select>
                    <label for="floatingInput">Department</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="company_description" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Description</label>
                </div>
                <div class="submit-box mt-3">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="../home/home.php" class="btn btn-danger">Chanel</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>