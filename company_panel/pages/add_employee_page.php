<?php
include "../db/connect_db.php";

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

    $sql = "INSERT INTO employees (first_name, last_name, email, dob, phone_number, gender, country, create_at, company_id)
    VALUES ('$first_name', '$last_name', '$email', '$dob', '$phone', '$gender', '$country', CURRENT_TIMESTAMP, 1)";

    if (mysqli_query($conn, $sql)) {
        $last_inserted_id = mysqli_insert_id($conn);

        if ($position == 'director') {
            $update_sql = "UPDATE employees SET super_employee_id = '$last_inserted_id' WHERE id = '$last_inserted_id'";
            mysqli_query($conn, $update_sql);
        }

        echo "Employee added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
                        </ul>
                    </div>
                </div>
            </nav>
    </header>
    <div class="wrapper">
        <div class="container bg-black-50 border w-75 Larger shadow bg-light p-3">
            <form action="" method="post">
            <p class="lead text-center text-black display-6">Add Employee</p>
                <div class="input_cont d-flex justify-content-space-between gap-3 w-100">
                    <div class="form-floating mb-3 w-50">
                        <input type="text" class="form-control" id="floatingInput" name="name" placeholder="name@example.com">
                        <label for="floatingInput">First name</label>
                    </div>
                    <div class="form-floating mb-3 w-50">
                        <input type="text" class="form-control" id="floatingInput" name="last_name" placeholder="name@example.com">
                        <label for="floatingInput">Last name</label>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="input_cont d-flex justify-content-space-between gap-3 w-100">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="floatingInput" name="dob" placeholder="name@example.com">
                        <label for="floatingInput">Date of birth</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="floatingInput" name="phone" placeholder="name@example.com">
                        <label for="floatingInput">Phone</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingInput" name="gender">
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                        </select>
                        <label for="floatingInput">Gender</label>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingInput" name="company">
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
                            mysqli_close($conn);
                        ?>
                    </select>
                    <label for="floatingInput">Company</label>
                </div>
                <div class="input_cont d-flex justify-content-space-between gap-3 w-100">
                    <div class="form-floating mb-3 w-50">
                        <select class="form-select" id="floatingInput" name="country">
                            <option value="armenia" selected>Armenia</option>
                            <option value="usa">USA</option>
                            <option value="france">France</option>
                            <option value="russia">Russia</option>
                        </select>
                        <label for="floatingInput">Country</label>
                    </div>
                    <div class="form-floating mb-3 w-50">
                        <select class="form-select" id="floatingInput" name="position">
                            <option value="director" selected>Director</option>
                            <option value="manager">Manager</option>
                            <option value="secretary">Secretary</option>
                            <option value="resources_department">Human Resources Department</option>
                            <option value="developer">Developer</option>
                            <option value="worker">Worker</option>
                            <option value="cleanser">Cleanser</option>
                        </select>
                        <label for="floatingInput">Position</label>
                    </div>
                    <div class="form-floating mb-3 w-50">
                        <input type="number" class="form-control" id="floatingInput" name="salary" placeholder="name@example.com">
                        <label for="floatingInput">Salary</label>
                    </div>
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