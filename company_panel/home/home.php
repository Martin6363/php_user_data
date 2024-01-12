<?php
    session_start();
    if (!isset($_SESSION['login_value'])) {
        header('Location: ../pages/login_page.php');
        exit();
    } 
    include "../db/connect_db.php";
    include('pagination.php'); 
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
</head>
<body>
    <div class="wrapper">
        <header class="header w-100">
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="nav_item_box d-inline">
                        <a class="navbar-brand" style="user-select: none;" href="./home.php">Admin Panel</a>
                        <ul class="navbar-nav d-flex flex-row nav_ul">
                            <li class="nav-item">
                                <button type="button" class="btn text-light" data-bs-toggle="modal" data-bs-target="#exampleModal6">
                                    <i class="h5 fa-solid fa-gear"></i>   
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal5">
                                    <?= isset($_SESSION['login_value']) ? 'Log Out' : 'Login'?>
                                    <i class="ml-3 fa-solid fa-right-from-bracket"></i>
                                </button>
                            </li>
                        </ul>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <button type="button" class="btn text-light nav_link_hover w-100" data-bs-toggle="modal" data-bs-target="#exampleModal6">
                                    <i class="fa-solid fa-gear"></i> <span>Settings</span>  
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn text-light nav_link_hover w-100" data-bs-toggle="modal" data-bs-target="#exampleModal5">
                                    <i class="fa-solid fa-right-from-bracket"></i> <?= isset($_SESSION['login_value']) ? 'Log Out' : 'Login'?>
                                </button>
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
                                        <i class="fa-solid fa-plus"></i> Add
                                    </button>
                                </h4>
                                <div class="filter_box">
                                    <h3 class="text-light text-center">Filter Details</h3>
                                    <div class="filter_container">
                                        <div class="filter_select_box" style="width: 100%;">
                                            <div class="filter_box">
                                                <label for="filter_position" style="color: #aaa;">By position</label>                                 
                                                <select class="form-select mr-3 p-1" style="width: 80px;" id="filter_position" name="filter_position" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                    <option value="All" selected>All</option>
                                                    <option value="Employees">Employees</option>
                                                    <option value="Directors">Directors</option>
                                                    <?php
                                                        $sql_position_data = "SELECT * FROM positions";
                                                        $sql_position_data_result = mysqli_query($conn, $sql_position_data);

                                                        if (mysqli_num_rows($sql_position_data_result) > 0) :
                                                            while($row = mysqli_fetch_assoc($sql_position_data_result)) :
                                                    ?>
                                                            <option value="<?= $row['id'];?>"><?= $row['p_name'];?></option>
                                                    <?php
                                                            endwhile;
                                                        endif;
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="filter_box">
                                                <label for="filter_gender" style="color: #aaa;">By gender</label>
                                                <select class="form-select p-1" id="filter_gender" name="filter_gender" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                    <option value="All" selected>All</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <button class="filter_btn ml-3" id="filter_btn" type="button"><i class="fa-solid fa-filter"></i></button>
                                        </div>
                                        <div class="mb-3 mt-4 w-20 d-flex">
                                            <input type="text" class="form-control search_input" id="search" placeholder="Search">
                                            <button class="btn btn-outline-info" id="search_btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                    </div>
                                    <button id="refreshBtn" class="btn btn-outline-info mt-2 btn-sm"><i class="fa-solid fa-arrows-rotate"></i></button>
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
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success btn-sm editBtn" data-bs-target="#exampleModal2" data-bs-toggle="modal">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm deleteBtn" data-bs-target="#exampleModal3" data-bs-toggle="modal">
                                                                <i class="fa-solid fa-trash"></i>
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
                        <?php include "./modals/add.php"?>
                        <?php include "./modals/edit.php" ?>
                        <?php include "./modals/delete.php"?>
                        <?php include "./modals/view.php"?>
                        <?php include "./modals/logOut.php"?>
                        <?php include "./modals/settings.php"?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./requests/query.js"></script>
</body>
</html>