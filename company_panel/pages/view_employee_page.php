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
                        <a class="navbar-brand" href="../home/home.php">Company</a>
                        <ul class="navbar-nav d-flex flex-row nav_ul">
                            <li class="nav-item">
                                <a class="nav-link active nav_link_hover" aria-current="page" href="../home/home.php">Home</a>
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
                                <a class="nav-link active nav_link_hover" aria-current="page" href="../home/home.php">Home</a>
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
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="w-100 d-flex align-items-center h-100">
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
                    
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>