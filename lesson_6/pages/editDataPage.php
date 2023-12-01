<?php
session_start();

if(isset($_GET['id'])) {
    $id_to_edit = $_GET['id'];

    $file_name = '../upload/data.json';
    $existing_data = json_decode(file_get_contents($file_name), true);

    $user_to_edit = '';
    foreach ($existing_data as $data) {
        if ($data['id'] == $id_to_edit) {
            $user_to_edit = $data;
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
        <form action="../actions/editData.php" method="post" class="row g-3 border p-2 rounded w-50 mx-auto">
            <input type="hidden" name="id" value="<?=$user_to_edit['id']?>">

            <div class="col-md-6">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="first_name" value="<?=$user_to_edit['first_name']?>">
            </div>
            <div class="col-md-6">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="last_name" value="<?=$user_to_edit['last_name']?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputAddress" name="email" value="<?=$user_to_edit['email']?>">
            </div>
            <div class="col-12">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" value="<?=$user_to_edit['image_path']?>">
                <img src="<?= $user_to_edit['image_path']?>" class="img img-thumbnail mx-auto d-block mt-2" alt="Current Image"/>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="update">Save</button>
                <a href="../home/home.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>