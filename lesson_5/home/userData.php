<?php
session_start();
    $_SESSION['usersData'] = [
        [
            'id' => 1,
            'f_name' => 'John',
            'l_name' => 'Cena',
            'age' => 46,
            'email' => 'jon.cena@gmail.com',
            'gender' => 'boy',
            'country' => 'America',
            'phone_number' => '(203) 352-8600',
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
            'country' => 'America',
            'phone_number' => '(203) 352-8600',
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
            'country' => 'Armenia',
            'phone_number' => '(203) 352-8600',
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
            'country' => 'Armenia',
            'phone_number' => '(203) 352-8600',
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
            'country' => 'Armenia',
            'phone_number' => '(203) 352-8600',
            'born' => 'April 23, 2003',
            'image_path' => 'https://cdn-icons-png.flaticon.com/512/21/21104.png'
        ]
    ];

    $user_data = $_SESSION['usersData'];
?>