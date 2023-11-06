<?php
session_start();
include './userData.php';
// if (empty($_SESSION['registration_data'])) {
//     header('Location: ../lesson_5/loginPage.php');
//     exit();
// }

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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.scss">
</head>
<body>
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
                            echo  '<a class="logout_link" href="../lesson_5/logout.php">Logout</a>';
                        } else {
                            echo '<a class="logout_link" href="../lesson_5/loginPage.php">Login</a>';
                        }
                    ?>
                </div>
            </nav>
        </header>
        <main>
            <form action="" method="get">
                <input type="text" name="search_data" placeholder="Search">
                <button type="submit" name="search_submit">Search</button>
            </form>
            <form action="" method="post">
                <input type="text" name="add_name" placeholder="Name">
                <input type="hidden" name="delete_user" value="">
                <button type="submit" name="filter_submit">Add</button>
            </form>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
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
                        $age_filter = isset($_GET['filter_submit']) ? (int)$_GET['age_filter'] : null;
                        $search = isset($_GET['search_submit']) ? strtolower($_GET['search_data']) : null;
                        foreach ($user_data as $userData) {   
                            $userId = $userData['id'];
                            $userFirstName = strtolower($userData['f_name']);
                    ?>
                        <tr id="user_row_<?php echo $userId; ?>">
                            <td><?php echo $userId; ?></td>
                            <td><img src="<?php echo $userData['image_path']; ?>" alt=""></td>
                            <td style="background: <?php echo $search ? 'yellow' : 'none'; ?>"><?php echo $userData['f_name']; ?></td>
                            <td><?php echo $userData['l_name']; ?></td>
                            <td style="background: <?php echo $age_filter ? 'yellow' : 'none'; ?>"><?php echo $userData['age']; ?></td>
                            <td><?php echo $userData['email']; ?></td>
                            <td><?php echo $userData['gender']; ?></td>
                            <td><?php echo $userData['country']; ?></td>
                            <td><?php echo $userData['phone_number']; ?></td>
                            <td><?php echo $userData['born']; ?></td>
                            <td>
                                <form action="./userData.php" method="post">
                                    <button>Edit</button>
                                    <button type="submit" name="delete_user" value="<?php echo $userId; ?>">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
