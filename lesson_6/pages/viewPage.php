<?php
include('../validate/validate.php');
session_start();

if(isset($_GET['id'])) {
    $id_to_edit = $_GET['id'];

    $file_name = '../upload/data.json';
    $existing_data = json_decode(file_get_contents($file_name), true);

    $user_view = null;
    foreach ($existing_data as $data) {
        if ($data['id'] == $id_to_edit) {
            $user_view = $data;
            break;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles/edit.css">
    <title>Document</title>
</head>
<body class="bg-dark">
    <div class="container h-100 mt-5">
        <div class="row g-3 border p-2 rounded w-50 mx-auto responsive">
            <input type="hidden" name="id" value="<?=$user_view['id']?>">

            <div class="col-md-6">
                <label for="firstName" class="form-label">First Name</label>
                <span class="form-control" id="firstName" name="first_name"><?=$user_view['first_name']?></span>
            </div>
            <div class="col-md-6">
                <label for="lastName" class="form-label">Last Name</label>
                <span class="form-control" id="lastName" name="last_name"><?=$user_view['last_name']?></span>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Email</label>
                <span class="form-control" id="inputAddress" name="email"><?=$user_view['email']?></span>
            </div>
            <div class="col-12">
                <label for="image" class="form-label">Image</label>
                <img src="<?= $user_view['image_path']?>" class="img img-thumbnail mx-auto d-block" id="image" name="image"/>
            </div>
            <div class="col-12">
            <a href="../home/home.php" class="w-100 badge bg-secondary text-light pt-2 pb-2">BACK</a>
            </div>
        </div>
    </div>
</body>
</html>