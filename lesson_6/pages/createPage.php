<?php
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles/create_data.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container w-50 my-5 bg-black-50 border Larger shadow">
        <?php include('../message/message.php') ?>
        <form class="w-100 border-1 p-2" action="../actions/createData.php" method="post" enctype="multipart/form-data">
            <p class="lead text-center text-light display-6">Create User
                
            </p>
            <div class="mb-3">
                <label for="f_name" class="form-label">First Name</label>
                <input type="text" name="f_name" class="form-control" id="f_name" placeholder="Enter first name"
                value="<?= $_SESSION['old_value']['first_name']?? ''?>">
                <?php if (isset($_SESSION['error_message']['first_name'])): ?>
                    <div class="text-danger"><?php echo $_SESSION['error_message']['first_name']; ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="l_name" class="form-label">Last Name</label>
                <input type="text" name="l_name" class="form-control" id="l_name" placeholder="Enter Last name"
                value="<?= $_SESSION['old_value']['last_name']?? ''?>">
                <?php if (isset($_SESSION['error_message']['last_name'])): ?>
                    <div class="text-danger"><?php echo $_SESSION['error_message']['last_name']; ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email"
                value="<?= $_SESSION['old_value']['email']?? ''?>">
                <?php if (isset($_SESSION['error_message']['email'])): ?>
                    <div class="text-danger"><?php echo $_SESSION['error_message']['email']; ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" id="formFile" name="image">
                <p class="lead h6">Image must not exceed 2 mb</p>
            </div>
            <button type="submit" name="create" class="btn btn-primary">Create</button>
            <button type="reset" class="btn btn-danger float-end">Reset</button>
        </form>
        <a href="../home/home.php" class="w-100 badge bg-secondary text-light pt-2 pb-2">BACK</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
if(isset($_SESSION['error_message'])){
    unset($_SESSION['error_message']);
}
?>