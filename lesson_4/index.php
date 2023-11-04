<?php

$subMenu = [
    'Articles' => [
        'Frontend' => [
            'HTML' => 'URL-for-HTML',
            'CSS/SASS' => 'URL-for-CSS-SASS',
            'JavaScript' => 'URL-for-JavaScript'
        ],
        'Backend' => [
            'PHP' => 'https://www.php.net/',
            'Python' => 'URl for Python',
            'NodeJs' => 'URl for NodeJs',
            'Java' => 'URl for Java',
            'Rudy' => 'URl for Rudy'
        ]
    ]
];


function generateSubMenu ($menuItems) {
    foreach ($menuItems as $text => $data) {
        if (is_array($data)) {
            echo '<ul class="submenu2">';
            generateSubMenu($data);
            echo '</ul>';
        } else {
            echo '<li><a href="' . $data . '">' . $text . '</a></li>';
        }
    }
};
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
                <a class="logout_link" href="../lesson_5/logout.php">Logout</a>
            </nav>
        </header>
    </div>
</body>
</html>
