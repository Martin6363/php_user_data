<?php
session_start();
require '../connectMySql.php';
?>


<?php include("../includes/header.php")?>
    <div class="container my-5">
        <?php include('../message/createMessage.php')?>
        <div class="row">
            <div class="col-md-12">
                <div class="card Larger shadow">
                    <div class="card-header">
                        <h4>User View Details
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
                                    <label class="form-label text-secondary">First Name</label>
                                    <p class="form-control">
                                        <?=$user['f_name'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputLastName1" class="form-label text-secondary">Last Name</label>
                                    <p class="form-control">
                                        <?=$user['l_name'];?>
                                    </p>
                                </div>
                                <div class="mb-3 w-25">
                                    <label class="form-label text-secondary">Age</label>
                                    <p class="form-control">
                                        <?=$user['age']?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-secondary">Email address</label>
                                    <p class="form-control">
                                        <?=$user['email']?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-secondary">Gender</label>
                                    <p class="form-control">
                                        <?=$user['gender']?>
                                    </p>
                                </div>
                                <label class="form-label text-secondary">Country</label>
                                <p class="form-control">
                                    <?=$user['country'];?>
                                </p>
                                <div class="mb-3 w-25">
                                    <label class="form-label text-secondary">Phone</label>
                                    <p class="form-control">
                                        <?=$user['phone_number'];?>
                                    </p>
                                </div>
                                <div class="mb-3 w-25">
                                    <label class="form-label text-secondary">Date of birth</label>
                                    <p class="form-control">
                                        <?=$user['born'];?>
                                    </p>
                                </div>
                            </form>
                        <?php
                                } else {
                                    echo "<h4> NO Such Id Found";
                                }
                            } 
                            mysqli_close($con);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("../includes/footer.php")?>
