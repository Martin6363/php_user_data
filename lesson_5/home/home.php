<?php
session_start();
include './userData.php';
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
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Age</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Country</th>
                                            <th>Phone Number</th>
                                            <th>Born</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM crud";
                                            $query_run = mysqli_query($con, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach($query_run as $userValue) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $userValue['id'];?></td>
                                                        <td><?= $userValue['f_name'];?></td>
                                                        <td><?= $userValue['l_name'];?></td>
                                                        <td><?= $userValue['age'];?></td>
                                                        <td><?= $userValue['email'];?></td>
                                                        <td><?= $userValue['gender'];?></td>
                                                        <td><?= $userValue['country'];?></td>
                                                        <td><?= $userValue['phone_number'];?></td>
                                                        <td><?= $userValue['born'];?></td>
                                                        <td>
                                                            <div class="action-table-box">
                                                                <a href="../actions/viewData.php?id=<?= $userValue['id']; ?>" name="view_user" class="btn btn-info btn-sm">View</a>
                                                                <a href="../actions/editData.php?id=<?= $userValue['id']; ?>" name="edit_user" class="btn btn-success btn-sm">Edit</a>
                                                                <form action="../actions/deleteData.php" method="post" class="d-inline">
                                                                    <button class="btn btn-danger btn-sm" name="delete_user" value="<?= $userValue['id'];?>">Delete</button>
                                                                </form>
                                                            </div>
                                                       </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                echo "<h5> No Record Found </h5>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php include("../includes/footer.php")?>
