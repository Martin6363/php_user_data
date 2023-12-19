<?php
    session_start();
    include "../db/connect_db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles/home.css">
</head>
<body>
    <div class="wrapper">
        <header class="header w-100">
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="nav_item_box d-inline">
                        <a class="navbar-brand" href="#">Company</a>
                        <ul class="navbar-nav d-flex flex-row nav_ul">
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" aria-current="page" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="../pages/add_employee_page.php">Add Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="../pages/view_employee_page.php">
                                    View Employee
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="#">Salary Table</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="../pages/login_page.php"><?= isset($_SESSION['login_value']) ? 'Logout' : 'Login'?></a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item mt-3">
                                <a class="nav-link active nav_link_hover" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="../pages/add_employee_page.php">Add Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="#">View Employee</a>
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
        <main class="w-100 d-flex align-items-center h-100">
        <?php
            $sql_department = "SELECT * FROM departments";
            $sql_department_result = mysqli_query($conn, $sql_department);

            $sql_position = "SELECT * FROM positions";
            $sql_position_result = mysqli_query($conn, $sql_position);

            if (mysqli_num_rows($sql_department_result) > 0 || mysqli_num_rows($sql_position_result) > 0) {
        ?>
            <div class="main_content">
                <h2 class="main_title">Head of the company</h2>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@instagram</td>
                        </tr>
                    </tbody>
                </table>
                <div class="main_body">
                    <h3 class="company_title">Your Company</h3>
                    <div class="company_container">
                                <?php
                                    $sql_company = "SELECT * FROM companies";
                                    $sql_company_result = mysqli_query($conn, $sql_company);

                                    if (mysqli_num_rows($sql_company_result) > 0) {
                                ?>
                                    <table class="table table-dark table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">NO</th>
                                                <th scope="col">Company name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Departments</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $quantity = 1; 
                                                foreach ($sql_company_result as $value) : 
                                                    $sql_departments = "SELECT department_name FROM departments
                                                    RIGHT JOIN companies ON departments.id = companies.department_id
                                                    WHERE companies.id = " . $value['id'];
         
                                                    $departments_result = mysqli_query($conn, $sql_departments);
                                                    $departments = mysqli_fetch_all($departments_result, MYSQLI_ASSOC);
                                            ?>                     
                                                <tr>
                                                    <th scope="row"><?= $quantity;?></th>
                                                    <td><?= $value['company_name'];?></td>
                                                    <td><?= $value['company_type'];?></td>
                                                    <td><?= $value['company_description'];?></td>
                                                    <td>
                                                        <?php
                                                            foreach ($departments as $department_value) {
                                                                echo $department_value['department_name'];
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php
                                                    $quantity++;
                                                endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                <?php
                                    }  else {
                                ?>
                                    <div class="create_table_container">
                                        <h5>If you have not yet created your company table where all the details about the company will be, click <b>Create Company Table</b></h5>
                                        <a href="../pages/create_company_page.php">Create Company Table</a>
                                    </div>
                                <?php
                                    }
                                ?>
                    </div>
                </div>
            </div>
            <?php
                } else {
            ?>
                    <div class="modal_cont">
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    </div>
                                    <div class="modal-body">
                                        Click Ok to apply the settings
                                    </div>
                                    <div class="modal-footer">
                                        <a href="../db/seeders/department/query.php" class="btn btn-primary">Ok</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            ?>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        let myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
        myModal.show();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>