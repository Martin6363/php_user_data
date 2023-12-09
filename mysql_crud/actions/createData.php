<?php
session_start();
require '../connectMySql.php';

if (isset($_POST['create_btn'])) {
    if (empty($_SESSION['login_data'])) {
        $_SESSION['message'] = "Some activities will be available after registration";
        header("Location: ../pages/loginPage.php");
        exit();
    } else {
        $fname = mysqli_real_escape_string($con, $_POST['f_name']);
        $lname = mysqli_real_escape_string($con, $_POST['l_name']);
        $age = $_POST['age'];
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $gender = $_POST['gender'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $phone = preg_replace("/[^0-9]/", "", $phone);
        $born = $_POST['date_of_birth'];
        
        if(strlen($phone) > 15) {
            $_SESSION['message'] = "Phone number is too long.";
            header("Location: createData.php");
            exit();
        }

        $query = "INSERT INTO crud (f_name, l_name, age, email, gender, country, phone_number, born) VALUES
        ('$fname', '$lname', '$age', '$email', '$gender', '$country', '$phone', '$born')";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['message'] = "User Created Successfully";
            header("Location: createData.php");
            exit();
        } else {
            $_SESSION['message'] = "User Not Created";
            header("Location: createData.php");
            exit();
        }
    }
}
mysqli_close($con);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Hello, world!</title>
    </head>
    <body class="bg-black-50" style="background-color: #2A3D4F">
        <div class="container my-5 bg-black-50 border w-75 Larger shadow bg-light">
            <?php include('../message/createMessage.php')?>
            <form method="post" class="border-1 p-2">
                <p class="lead text-center display-6">Create User
                <a href="../home/home.php" class="btn btn-danger float-end">BACK</a>
                </p>
                <div class="mb-3">
                    <label for="exampleInputFirstName1" class="form-label text-secondary">First Name</label>
                    <input type="text" class="form-control" id="exampleInputFirstName1" name="f_name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputLastName1" class="form-label text-secondary">Last Name</label>
                    <input type="text" class="form-control" id="exampleInputLastName1" name="l_name">
                </div>
                <div class="mb-3 w-25">
                    <label for="exampleInputAge1" class="form-label text-secondary">Age</label>
                    <input type="number" class="form-control" id="exampleInputAge1" min="1" max="100" name="age">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label text-secondary">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault3" value="Other" checked>
                    <label class="form-check-label" for="flexRadioDefault3">
                        Other
                    </label>
                </div>
                <label for="country" class="form-label text-secondary">Country</label>
                <select class="form-select form-select-sm mb-3 w-25" aria-label=".form-select-sm example" id="country" name="country" onchange="this.form.submit()">
                    <option selected>Armenia</option>
                    <option value="Russia">Russia</option>
                    <option value="America">America</option>
                    <option value="France">France</option>
                </select>
                <div class="mb-3 w-25">
                    <label for="exampleInputPhone1" class="form-label text-secondary">Phone</label>
                    <input type="text" class="form-control" id="exampleInputPhone1" name="phone">
                </div>
                <div class="mb-3 w-25">
                    <label for="exampleInputDate1" class="form-label text-secondary">Date of birth</label>
                    <input type="date" class="form-control" id="exampleInputDate1" name="date_of_birth">
                </div>
                <button type="submit" class="btn btn-primary" name="create_btn">Create</button>
                <a href="../home/home.php" class="btn btn-danger">Chanel</a>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>