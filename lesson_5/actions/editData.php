<?php
session_start();
include '../home/userData.php';
require '../connectMySql.php';

    if(isset($_POST['update_user'])) {
        if (empty($_SESSION['login_data'])) {
            $_SESSION['message'] = "Some activities will be available after registration";
            header("Location: ../pages/loginPage.php");
            exit();
        } else {
            $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
            $fname = mysqli_real_escape_string($con, $_POST['f_name']);
            $lname = mysqli_real_escape_string($con, $_POST['l_name']);
            $age = $_POST['age'];
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $gender = $_POST['gender'];
            $country = $_POST['country'];
            $phone = $_POST['phone'];
            $born = $_POST['date_of_birth'];
    
            $query = "UPDATE crud SET f_name='$fname', l_name='$lname', age='$age', email='$email', gender='$gender', country='$country', born='$born'
                        WHERE id='$user_id'";
            $query_run = mysqli_query($con, $query);
            if ($query_run) {
                $_SESSION['message'] = "User Updated Successfully";
                header("Location: ../home/home.php");
                exit();
            } else {
                $_SESSION['message'] = "User Not Updated";
                header("Location: ../home/home.php");
                exit();
            }
        }
    }

?>


<?php include("../includes/header.php")?>
    <div class="container my-5">
        <?php include('../message/createMessage.php')?>
        <div class="row">
            <div class="col-md-12">
                <div class="card Larger shadow">
                    <div class="card-header">
                        <h4>Update User
                            <a href="../home/home.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id'])) {
                                $user_id = mysqli_real_escape_string($con, $_GET['id']);
                                $query = "SELECT * FROM crud WHERE id='$user_id'";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    $user = mysqli_fetch_array($query_run);
                                    ?>

                                    <form method="post" class="border-1 p-2">
                                        <input type="hidden" name="user_id" value="<?= $user['id'];?>">
                                        <div class="mb-3">
                                            <label for="exampleInputFirstName1" class="form-label text-secondary">First Name</label>
                                            <input type="text" class="form-control" value="<?=$user['f_name'];?>" id="exampleInputFirstName1" name="f_name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputLastName1" class="form-label text-secondary">Last Name</label>
                                            <input type="text" class="form-control" value="<?=$user['l_name'];?>" id="exampleInputLastName1" name="l_name">
                                        </div>
                                        <div class="mb-3 w-25">
                                            <label for="exampleInputAge1" class="form-label text-secondary">Age</label>
                                            <input type="number" class="form-control" value="<?=$user['age'];?>" id="exampleInputAge1" min="1" max="100" name="age">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label text-secondary">Email address</label>
                                            <input type="email" class="form-control" value="<?=$user['email'];?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male"<?php if ($user['gender'] === 'Male') echo ' checked'; ?>>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female"<?php if ($user['gender'] === 'Female') echo ' checked'; ?>>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault3" value="Other"<?php if ($user['gender'] === 'Other') echo ' checked'; ?>>
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                Other
                                            </label>
                                        </div>
                                        <label for="country" class="form-label text-secondary">Country</label>
                                        <select class="form-select form-select-sm mb-3 w-25" aria-label=".form-select-sm example" value="<?=$user['country'];?>" id="country" name="country">
                                            <option selected>Armenia</option>
                                            <option value="1">Russia</option>
                                            <option value="2">America</option>
                                            <option value="3">France</option>
                                        </select>
                                        <div class="mb-3 w-25">
                                            <label for="exampleInputPhone1" class="form-label text-secondary">Phone</label>
                                            <input type="tel" class="form-control" id="exampleInputPhone1" name="phone" value="<?=$user['phone_number'];?>">
                                        </div>
                                        <div class="mb-3 w-25">
                                            <label for="exampleInputDate1" class="form-label text-secondary">Date of birth</label>
                                            <input type="date" class="form-control" id="exampleInputDate1" name="date_of_birth" value="<?=$user['born'];?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="update_user">Update</button>
                                        <a href="../home/home.php" class="btn btn-danger">Chanel</a>
                                    </form>
                                <?php
                                } else {
                                    echo "<h4> NO Such Id Found";
                                }
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("../includes/footer.php")?>
