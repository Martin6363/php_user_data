<?php
include "../db/connect_db.php";
include "../actions/Employee.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $first_name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $company = $_POST['company'];

    $employee = new Employee;
    $result = $employee->addEmployee($first_name, $last_name, $email, $dob, $phone, $gender, $country, $company, $position, $salary);
    echo $result;
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
                        </ul>
                    </div>
                </div>
            </nav>
    </header>
    <div class="wrapper">
        <?php
            $check_sql_company = "SELECT * FROM companies";
            $check_sql_company_result = mysqli_query($conn, $check_sql_company);

            if (mysqli_num_rows($check_sql_company_result) > 0) {
        ?>
            <div class="container bg-black-50 border w-75 Larger shadow bg-light p-3">
                <?php
                    if (isset($_SESSION['employee_add_message'])) :
                ?>
                    <div class="auto-close alert alert-info" role="alert">
                        <?= $_SESSION['employee_add_message'];?>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    endif;
                ?>
                <form action="" method="post">
                    <p class="lead text-center text-black display-6">Add Employee</p>
                    <div class="input_cont d-flex justify-content-space-between gap-3 w-100">
                        <div class="form-floating mb-3 w-50">
                            <input type="text" class="form-control" id="floatingInput" name="name" placeholder="name@example.com" required/>
                            <label for="floatingInput">First name</label>
                        </div>
                        <div class="form-floating mb-3 w-50">
                            <input type="text" class="form-control" id="floatingInput" name="last_name" placeholder="name@example.com" required/>
                            <label for="floatingInput">Last name</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required/>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="input_cont d-flex justify-content-space-between gap-3 w-100">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="dob" placeholder="name@example.com" required/>
                            <label for="floatingInput">Date of birth</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="floatingInput" name="phone" placeholder="name@example.com" required/>
                            <label for="floatingInput">Phone</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingInput" name="gender" required>
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            </select>
                            <label for="floatingInput">Gender</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingInput" name="company" required>
                            <?php
                                $sql_company = "SELECT * FROM companies";
                                $sql_company_result = mysqli_query($conn, $sql_company);

                                if (mysqli_num_rows($sql_company_result) > 0) :
                                    foreach($sql_company_result as $value) :
                            ?>
                                <option value="<?= $value['id']?>" selected><?= $value['company_name']?></option>
                            <?php
                                endforeach;
                                endif;
                            ?>
                        </select>
                        <label for="floatingInput">Company</label>
                    </div>
                    <div class="input_cont d-flex justify-content-space-between gap-3 w-100">
                        <div class="form-floating mb-3 w-50">
                            <select class="form-select" id="floatingInput" name="country" required>
                                <option value="armenia" selected>Armenia</option>
                                <option value="usa">USA</option>
                                <option value="france">France</option>
                                <option value="russia">Russia</option>
                            </select>
                            <label for="floatingInput">Country</label>
                        </div>
                        <div class="form-floating mb-3 w-50">
                            <select class="form-select" id="floatingInput" name="position" required>
                                <?php
                                    $sql_position = "SELECT * FROM positions";
                                    $sql_position_result = mysqli_query($conn, $sql_position);

                                    if (mysqli_num_rows($sql_position_result) > 0) :
                                        foreach($sql_position_result as $value) :
                                ?>
                                    <option value="<?= $value['id']?>" selected><?= $value['position_name']?></option>
                                <?php
                                    endforeach;
                                    endif;
                                    mysqli_close($conn);
                                ?>
                            </select>
                            <label for="floatingInput">Position</label>
                        </div>
                        <div class="form-floating mb-3 w-50">
                            <input type="number" class="form-control" id="floatingInput" name="salary" placeholder="name@example.com" required>
                            <label for="floatingInput">Salary</label>
                        </div>
                    </div>
                    <div class="submit-box mt-3">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <a href="../home/home.php" class="btn btn-danger">Chanel</a>
                    </div>

                </form>
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Before adding an employee, you must create a Company in the "Create Company Table" section or click the "Create" button
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="./create_company_page.php" class="btn btn-primary">Create</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
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