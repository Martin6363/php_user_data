<?php

    // function pre_r($array) {
    //     echo '<pre>';
    //     print_r($array);
    //     echo '</pre>';
    // }

    // $x = 100;
    // $y = 19;

    // $x = $x + $y; // 100 + 19 = 119
    // $y = $x - $y; // 119 - 19 = 100
    // $x = $x - $y; // 119 - 100 = 19

    // echo 'X = ' . $x.'<br>';
    // echo 'Y = ' . $y.'<br>';

    // $v = 2500;
    // $t = 155;

    // $v = $v + $t; // 2500 + 155 = 2655
    // $t = $v - $t; // 2655 - 155 = 2500
    // $v = $v - $t; // 2655 - 2500 = 155

    // echo 'V = ' . $v.'<br>';
    // echo 'T = ' . $t.'<br>';
    
    // $z = 15;
    // $r = 60;

    // $z = $z + $r; // 15 + 60 = 75
    // $r = $z - $r; // 75 - 60 = 15
    // $z = $z - $r; // 75 - 15 = 60

    // echo 'Z = ' . $z.'<br>';
    // echo 'R = ' . $r.'<br>';



    $user_data = [
        [
            'id' => 1,
            'f_name' => 'John',
            'l_name' => 'Cena',
            'age' => 46,
            'email' => 'jon.cena@gmail.com',
            'gender' => 'boy',
            'city' => 'Los Angeles',
            'country' => 'America',
            'address' => '',
            'phone_number' => '(203) 352-8600',
            'works' => 'Filmography',
            'born' => 'April 23, 1977',
            'image_path' => 'https://cdn-icons-png.flaticon.com/512/21/21104.png'
        ],
        [
            'id' => 2,
            'f_name' => 'Mike',
            'l_name' => 'Tyson',
            'age' => 65,
            'email' => 'jon.cena@gmail.com',
            'gender' => 'boy',
            'city' => 'Los Angeles',
            'country' => 'America',
            'address' => '',
            'phone_number' => '(203) 352-8600',
            'works' => 'Filmography',
            'born' => 'April 23, 1977',
            'image_path' => 'https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg'
        ],
        [
            'id' => 3,
            'f_name' => 'Nelson',
            'l_name' => 'Petikyan',
            'age' => 27,
            'email' => 'nelson.cena@gmail.com',
            'gender' => 'boy',
            'city' => 'Gyumri',
            'country' => 'Armenia',
            'address' => '',
            'phone_number' => '(203) 352-8600',
            'works' => 'Filmography',
            'born' => 'April 23, 1996',
            'image_path' => 'https://cdn-icons-png.flaticon.com/512/21/21104.png'
        ],
        [
            'id' => 4,
            'f_name' => 'Arman',
            'l_name' => 'Aghayan',
            'age' => 22,
            'email' => 'armen.cena@gmail.com',
            'gender' => 'boy',
            'city' => 'Gyumri',
            'country' => 'Armenia',
            'address' => '',
            'phone_number' => '(203) 352-8600',
            'works' => 'Filmography',
            'born' => 'April 23, 2002',
            'image_path' => 'https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg'
        ],
        [
            'id' => 5,
            'f_name' => 'Samvel',
            'l_name' => 'Petoyan',
            'age' => 21,
            'email' => 'jon.cena@gmail.com',
            'gender' => 'boy',
            'city' => 'Gyumri',
            'country' => 'Armenia',
            'address' => '',
            'phone_number' => '(203) 352-8600',
            'works' => 'Filmography',
            'born' => 'April 23, 2003',
            'image_path' => 'https://cdn-icons-png.flaticon.com/512/21/21104.png'
        ]
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #fff;
        }

        input[type="number"], input[type="text"] {
            padding: 5px;
            width: 120px;
            margin: 5px 10px 0 10px;
        }

        button {
            padding: 5px 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            object-position: 50% 50%
        }
    </style>
    <script>
        function deleteUser(userId) {
            document.getElementById('user_row_' + userId).remove();
        }
    </script>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="search_data" placeholder="Search">
        <button type="submit" name="search_submit">Search</button>
    </form>
    <form action="" method="get">
        <input type="number" name="age_filter" placeholder="Filter by Age">
        <button type="submit" name="filter_submit">Filter</button>
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
                <th>City</th>
                <th>Country</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Works</th>
                <th>Born</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $age_filter = isset($_GET['filter_submit']) ? (int)$_GET['age_filter'] : null;
                $search = isset($_GET['search_submit']) ?  strtolower($_GET['search_data']) : null; 

                for ($i = 0; $i < count($user_data); $i++) {
                    $userId = $user_data[$i]['id'];
                    $userFirstName = strtolower($user_data[$i]['f_name']);
                    if (
                        (null == ($age_filter || $search) || $user_data[$i]['age'] == $age_filter) ||
                        ($search && stripos($userFirstName, $search) !== false)
                    ) {  
                ?>
                    <tr id="user_row_<?php echo $userId; ?>">
                        <td><?php echo $i + 1; ?></td>
                        <td><img src="<?php echo $user_data[$i]['image_path']?>" alt=""></td>
                        <td style="background: <?php echo $search ? 'yellow' : 'none'?>"><?php echo $user_data[$i]['f_name']; ?></td>
                        <td><?php echo $user_data[$i]['l_name']; ?></td>
                        <td style="background: <?php echo $age_filter ? 'yellow' : 'none'?>"><?php echo $user_data[$i]['age']; ?></td>
                        <td><?php echo $user_data[$i]['email']; ?></td>
                        <td><?php echo $user_data[$i]['gender']; ?></td>
                        <td><?php echo $user_data[$i]['city']; ?></td>
                        <td><?php echo $user_data[$i]['country']; ?></td>
                        <td><?php echo $user_data[$i]['address']; ?></td>
                        <td><?php echo $user_data[$i]['phone_number']; ?></td>
                        <td><?php echo $user_data[$i]['works']; ?></td>
                        <td><?php echo $user_data[$i]['born']; ?></td>
                        <td>
                            <button onclick="deleteUser(<?php echo $userId; ?>)">Delete</button>
                        </td>
                    </tr>
            <?php 
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>