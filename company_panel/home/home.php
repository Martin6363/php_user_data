<?php
    session_start();
    include "../db/connect_db.php";
    include('pagination.php'); 

    if (!isset($_SESSION['login_value'])) {
        header('Location: ../pages/login_page.php');
        exit();
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/styles/home.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <header class="header w-100">
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="nav_item_box d-inline">
                        <a class="navbar-brand" href="#">Admin Panel</a>
                        <ul class="navbar-nav d-flex flex-row nav_ul">
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="../pages/login_page.php"><?= isset($_SESSION['login_value']) ? 'Logout' : 'Login'?></a>
                            </li>
                        </ul>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link nav_link_hover" href="../pages/login_page.php"><?= isset($_SESSION['login_value']) ? 'Logout' : 'Login'?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="w-100 d-flex align-items-center justify-content-center flex-column h-100">
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12 w-100 p-0 m-0">
                        <div class="card Larger shadow w-100">
                            <div class="card-header">
                                <h4 class="text-light">Employee Details
                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Add Employee
                                    </button>
                                </h4>
                                <div class="input-group mb-3 mt-4">
                                    <input type="text" class="form-control" id="search" placeholder="Search">
                                    <button class="btn btn-outline-info" id="search_btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                                <div class="filter_box">
                                    <h6 class="text-light">Filter Data</h6>
                                    <div class="input-group filter_select_box" style="width: 20%;">
                                        <select class="form-select" id="filter_data" name="filter" id="inputGroupSelect04" aria-label="Example select with button addon">
                                            <option value="All" selected>All...</option>
                                            <option value="Employees">Employees</option>
                                            <option value="Directors">Directors</option>
                                        </select>
                                        <button class="btn btn-outline-info" id="filter_btn" type="button">Filter</button>
                                    </div>
                                    <button id="refreshBtn" class="btn btn-outline-info mt-2 btn-sm">Refresh</button>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table w-100" style="background: rgba(0,0,0,0.6); color: #ccc;">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID 
                                                <select class="sort_select" title="Sorting" name="sort" id="sort_id">
                                                    <option value="Default" selected>Default</option>
                                                    <option value="ASC">Asc</option>
                                                    <option value="DESC">Desc</option>
                                                </select>
                                            </th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope='col'>Date Of Birth</th>
                                            <th scope='col'>Company</th>
                                            <th scope='col'>Registered</th>
                                            <th scope='col'>Action</th>
                                        </th>
                                    </thead>
                                    <tbody id="showData">
                                        <?php
                                            while ($result = mysqli_fetch_assoc($sql_result)) :                                          
                                        ?>  
                                            <tr>
                                                <th scope="row"><?= $result['id']?></th>
                                                    <td><?=$result['first_name']?></td>
                                                    <td><?= $result['last_name']?></td>
                                                    <td><?=$result['email']?></td>
                                                    <td><?=$result['dob']?></td>
                                                    <td><?=$result['company_name']?></td>
                                                    <td><?=$result['create_at']?></td>
                                                    <td>
                                                        <div class="actions_table">
                                                            <input type="hidden" name="action_id" value="<?= $result['id']?>">
                                                            <button type="button" class="btn btn-info btn-sm viewBtn" data-bs-target="#exampleModal4" data-bs-toggle="modal">
                                                                View
                                                            </button>
                                                            <button type="button" class="btn btn-success btn-sm editBtn" data-bs-target="#exampleModal2" data-bs-toggle="modal">
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm deleteBtn" data-bs-target="#exampleModal3" data-bs-toggle="modal">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </td>
                                            </tr>
                                        <?php
                                            endwhile;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="main_body mt-3"> 
                        <!-- <div class="modal_cont">
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
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <?php include "./modals/add.php"?>
                        <?php include "./modals/edit.php" ?>
                        <?php include "./modals/delete.php"?>
                        <?php include "./modals/view.php"?>
                        <nav aria-label="Page navigation example p-0 m-0">
                            <ul class="pagination">
                                <li class="page-item">            
                                    <a class="page-link" href="./home.php?page=<?= $page > 1 ? $page - 1 : $page = 1?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        echo '<li class="page-item"><a class="page-link ' . ($page == $i ? "pagination_link" : '') . '" href="home.php?page='. $i .'">'. $i .'</a></li>';
                                    }
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="./home.php?page=<?= $page < $total_pages ? $page + 1 : $page = 1?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="main_footer">
                        <h2 class="text-light">Activity</h2>
                        <div class="dashboard">
                            <div class="progress_box">
                                <svg>
                                    <circle class="bg" cx="57" cy="57" r="52" />
                                    <circle class="meter-1" cx="57" cy="57" r="52" />
                                </svg>
                                <span class="progress_text">
                                    <i class="fa-solid fa-user"></i>
                                    <b>
                                        <?php
                                            $query_all_emp = "SELECT * FROM employees";
                                            $query_all_emp_result = mysqli_query($conn, $query_all_emp);
                                            if (mysqli_num_rows($query_all_emp_result) > 0) {
                                                $count_emp = mysqli_fetch_all($query_all_emp_result);
                                                echo count($count_emp);
                                            } else {
                                                echo "No User Result";
                                            }
                                        ?>
                                    </b>
                                </span>
                            </div>
                            <div class="progress_box">
                                <svg>
                                    <circle class="bg" cx="57" cy="57" r="52" />
                                    <circle class="meter-2" cx="57" cy="57" r="52" />
                                </svg>
                                <span class="progress_text">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                    <b>22,500</b>
                                </span>
                            </div>
                            <div class="progress_box">
                                <svg>
                                    <circle class="bg" cx="57" cy="57" r="52" />
                                    <circle class="meter-3" cx="57" cy="57" r="52" />
                                </svg>
                                <span class="progress_text">
                                    <i class="fa-solid fa-eye"></i>
                                    <b>5000</b>
                                </span>
                            </div>
                        </div>
                        <div class="chart_cont w-100 mt-3">
                            <?php include "./chart.php"?>
                        </div>
                    </div>            
                </div>
            </div>
        </main>
    </div>
    <script>
        $(document).ready(function () {
            $('.editBtn').on('click', function () {
                let employeeId = $(this).closest('tr').find('[name="action_id"]').val();

                $.ajax({
                    type: 'POST',
                    url: '../actions/edit.php',
                    data: { id: employeeId },
                    dataType: 'json',
                    success: function (response) {
                        $('#update_id').val(response.id);
                        $('#fname').val(response.first_name);
                        $('#lname').val(response.last_name);
                        $('#email').val(response.email);
                        $('#dob').val(response.dob);
                        $('#phone').val(response.phone_number);
                        $('#gender').val(response.gender);
                        $('#company').val(response.company_name);
                        $('#country').val(response.country);
                        $('#position').val(response.position_id);
                        $('#salary').val(response.salary_amount);
                        console.log(response);
                    },
                    error: function () {
                        console.log('Error fetching employee data.');
                    }
                });
            });


            $('.deleteBtn').on('click', function () {
                let idToDelete = $(this).closest('tr').find('[name="action_id"]').val();
                $('#exampleModal3').modal('show');
                $.ajax({
                    type: 'POST',
                    url: '../actions/delete.php',
                    data: { id: idToDelete },
                    dataType: 'json',
                    success: function (response) {
                        $('#delete_id').val(response.id);
                        $('#deleted_name').html(response.first_name+ ' ' + response.last_name);
                    },
                    error: function () {
                        console.log('Error fetching delete id.');
                    }
                })
            });


            $('.viewBtn').on('click', function () {
                let idToView = $(this).closest('tr').find('[name="action_id"]').val();
                $.ajax({
                    type: 'GET',
                    url: '../actions/view.php',
                    data: { id: idToView },
                    dataType: 'json',
                    success: function (response) {
                        $('#view_fname').html(response.first_name);
                        $('#view_lname').html(response.last_name);
                        $('#view_email').html(response.email);
                        $('#view_dob').html(response.dob);
                        $('#view_phone').html(response.phone_number);
                        $('#view_gender').html(response.gender);
                        $('#view_registered').html(response.create_at);
                        $('#view_fname').html(response.first_name);
                        $('#view_country').html(response.country);
                        $('#view_company').html(response.company_name);
                        $('#view_position').html(response.position_name);
                        $('#view_salary').html(response.salary_amount);
                        $('#exampleModal4').modal('show');
                    },
                    error: function () {
                        console.log('Error fetching employee data for view.');
                    }
                })
            })


            let searchTimeout;
            $('#search').on("keyup", function () {
                let searchValue = $(this).val();
                clearTimeout(searchTimeout);

                searchTimeout = setTimeout(function() {
                    $.ajax({
                        method: 'GET',
                        url: '../actions/search.php',
                        data: {search: searchValue},
                        beforeSend:function() {
                            $("#showData").html("<span>Searching...</span>");
                        },
                        success: function(response) {
                            $("#showData").html(response);
                        }
                    });
            }, 1000);
            });


            $('#filter_btn').on('click', function () {
                let value = $('#filter_data').val();
                $.ajax({
                    url: "../actions/filter.php",
                    type: 'GET',
                    data: {filter: value},
                    beforeSend:function() {
                        $("#showData").html("<span>Working...</span>");
                    },
                    success:function(data) {
                        $("#showData").html(data);
                    }
                })
            })

            $('#sort_id').on('change', function () {
                let value = $('#sort_id').val();

                $.ajax({
                    url: '../actions/sort_by_id.php',
                    type: 'GET',
                    data: { sort: value },
                    beforeSend:function() {
                            $("#showData").html("<span>Sorting...</span>");
                        },
                    success:function(data) {
                        $("#showData").html(data);
                        console.log(data);
                    }
                });
            })

            $("#refreshBtn").on("click",function(){
                window.location.reload();
            });

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>