<?php
include('../actions/createData.php');

if (isset($_SESSION['old_value'])) {
    unset($_SESSION['old_value']);
}
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles/home.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container d-flex align-items-center justify-content-center w-100">
        <div class="row w-100">
            <div class="col-md-12">
            <?php include('../message/message.php') ?>
                <div class="card Larger shadow">
                    <div class="card-header">
                        <h4 class="text-light">User Details
                            <a href="../pages/createPage.php" name="filter_submit" class="btn btn-primary float-end">Add User</a>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-dark table-striped w-100 table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $jsonData = file_exists('../upload/data.json') ? file_get_contents('../upload/data.json') : '';
                                    $users = json_decode($jsonData, true) ? json_decode($jsonData, true) : '';

                                    if ($jsonData) :
                                    foreach ($users as $value) :
                                ?>
                                    <tr class="align-center">
                                        <th scope='row' class="text-center"><?= $value['id']?></th>
                                        <td><img src="<?= $value['image_path']?>" class="img img-thumbnail mx-auto d-block" alt=""></td>
                                        <td><?= $value['first_name'];?></td>
                                        <td><?= $value['last_name'];?></td>
                                        <td><?= $value['email'];?></td>
                                        <td>
                                            <div class="action-box">
                                                <a href="../pages/viewPage.php?id=<?=$value['id']?>" class="btn btn-info btn-sm">View</a>
                                                <a href="../pages/editDataPage.php?id=<?=$value['id']?>" class="btn btn-success btn-sm">Edit</a>
                                                <a href="../actions/deleteData.php?id=<?=$value['id']?>" class="btn btn-danger btn-sm">Delete</a>
                                            </div>     
                                        </td>
                                    </tr>
                                <?php
                                    endforeach;
                                    endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>