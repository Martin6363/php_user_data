<?php
session_start();
require '../connectMySql.php';

$subMenu = [
    'Articles' => [
        'Frontend' => [
            'HTML' => 'URL-for-HTML',
            'CSS/SASS' => 'URL-for-CSS-SASS',
            'JavaScript' => 'URL-for-JavaScript'
        ],
        'Backend' => [
            'PHP' =>  'URL-for-PHP',
            'Python' => 'URL-for-Python',
            'NodeJs' => 'URL-for-NodeJs',
            'Java' => 'URL-for-Java',
            'Ruby' => 'URL-for-Rudy'
            ],
        ]
];

function generateSubMenu($menuItems) {
    foreach ($menuItems as $text => $data) {
        if (is_array($data)) {
            echo '<ul class="submenu2">';
            generateSubMenu($data);
            echo '</ul>';
        } else {
            echo '<li><a href="' . $data . '">' . $text . '</a></li>';
        }
    }
}
?>


<?php include("../includes/header.php")?>
    <div class="wrapper">
        <header class="header">
            <nav class="navigation_header"> 
                <h1 class="nav_title">Web Site</h1>
                <ul class="menu">
                    <li><a href="">Home</a></li>
                    <li><a href="">Projects</a></li>
                    <li>
                        <a href="">Articles</a>
                        <ul class="submenu">
                            <li><a href="">Fronted</a>
                                <ul class="submenu2">
                                    <?php generateSubMenu($subMenu['Articles']['Frontend']); ?>
                                </ul>
                            </li>
                            <li><a href="#">Backend</a>
                                <ul class="submenu2">
                                    <?php generateSubMenu($subMenu['Articles']['Backend']); ?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
                <div class="account_setting_box">
                    <span class="account_name">
                        <?php
                            if(isset($_SESSION['login_data']['user_login'])) {
                                echo 'Welcome ' . '<b>' . $_SESSION['login_data']['user_login'] . '</b>';
                            }
                        ?>
                    </span>
                    <?php
                        if (isset($_SESSION['login_data'])) {
                            echo  '<a class="logout_link" href="../logout.php">Logout</a>';
                        } else {
                            echo '<a class="logout_link" href="../pages/loginPage.php">Login</a>';
                        }
                    ?>
                </div>
            </nav>
        </header>
        <main>
            <div class="container mt-5">
                <?php include('../message/createMessage.php');?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card Larger shadow">
                            <div class="card-header">
                                <h4>User Details
                                    <a href="../actions/createData.php" name="filter_submit" class="btn btn-primary float-end">Add User</a>
                                </h4>
                                <div class="input-group mb-3 mt-3">
                                    <input type="text" class="form-control" id="search" placeholder="Search">
                                    <button class="btn btn-outline-secondary bg-warning bg-gradient" type="button" id="button-addon2">Search</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>
                                                <a href="#" id="sorting" data-column="age" data-order="desc" title="Sort Desc"><i class="fa-solid fa-arrow-down-9-1"></i></a>
                                                    Age 
                                                <a href="#" id="sorting" data-column="age" data-order="asc" title="Sort Asc"><i class="fa-solid fa-arrow-up-1-9" title="Sort Asc"></i></a>
                                                <a href="home.php" title="In ascending order"><i class="fa-solid fa-retweet ms-2 text-muted"></i></a>
                                            </th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Country</th>
                                            <th>Phone Number</th>
                                            <th>Born</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showData">
                                        <?php include('pagination_and_table.php'); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>    
                        <div class="page_limit_box">
                            <nav>
                                <ul class="pagination justify-content-center align-items-center mt-3">
                                    <li class="page-item"><a class="page-link" href="home.php?page=<?= $page > 1 ? $page - 1 : $page = 1?>">Previous</a></li>
                                    <?php
                                        for ($i = 1; $i <= $number_of_pages; $i++) {
                                            echo '<li class="page-item"><a class="page-link ' . ($page == $i ? "pagination_link" : '') . '" href="home.php?page='. $i .'">'. $i .'</a></li>';
                                        }
                                    ?>
                                    <li class="page-item"><a class="page-link" href="home.php?page=<?= $page < $number_of_pages ? $page + 1 : $page = 1?>">Next</a></li>
                                </ul>
                            </nav>
                            <form method="get" action="home.php" class="show_limit_page_box float-end">
                                <p class="mt-3 text-light">Show per page:</p>
                                <select class="form-select form-select-sm" name="limit_page" onchange="this.form.submit()">
                                    <option value="5" <?= $pages_limit == 5 ? 'selected' : ''; ?>>5 (default)</option>
                                    <option value="10" <?= $pages_limit == 10 ? 'selected' : ''; ?>>10</option>
                                    <option value="50" <?= $pages_limit == 50 ? 'selected' : ''; ?>>50</option>
                                </select>
                            </form> 
                        </div>   
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        $(document).ready(function () {
            $('#search').on("keyup", function () {
                let searchValue = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: '../actions/search_user.php',
                    data: {search: searchValue},
                    success: function(response) {
                        $("#showData").html(response);
                    }
                });
            });

            $('#sorting').click(function (e) {
                e.preventDefault();
                let column = $(this).attr('data-column');
                let order = $(this).attr('data-order');
                sortData(column, order);
            });

            function sortData(column, order) {
                $.ajax({
                    method: 'GET',
                    url: '../actions/sortData.php',
                    data: { sort: column, order: order },
                    success: function (response) {
                        if (!response.error) {
                            $("#showData").html(response);
                        } else {
                            console.error(response.error);
                        }
                    }
            });
            }
        });
    </script>
<?php include("../includes/footer.php")?>