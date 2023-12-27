<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                        if (isset($_SESSION['add_message'])) :
                    ?>
                        <div class="alert alert-info" role="alert">
                            <?= $_SESSION['add_message']?>
                            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        endif;
                    ?>
                    <form action="../actions/add.php" method="post">
                        <p class="lead text-center text-black display-6">Add Details</p>
                        <div class="input_cont d-flex justify-content-space-between gap-3 w-100">
                            <div class="form-floating mb-3 w-50">
                                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="name@example.com" required/>
                                <label for="floatingInput">First name</label>
                            </div>
                            <div class="form-floating mb-3 w-50">
                                <input type="text" class="form-control" id="floatingInput" name="last_name" placeholder="name@example.com" required/>
                                <label for="floatingInput">Last name</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required/>
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="input_cont d-flex justify-content-space-between gap-3 w-100">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="floatingInput" name="dob" placeholder="name@example.com" required/>
                                <label for="floatingInput">Date of birth</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="floatingInput" name="phone" placeholder="name@example.com" required/>
                                <label for="floatingInput">Phone</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingInput" name="gender" required>
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <label for="floatingInput">Gender</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingInput" name="company" required>
                                <?php
                                    $sql_company = "SELECT * FROM companies";
                                    $sql_company_result = mysqli_query($conn, $sql_company);

                                    if (mysqli_num_rows($sql_company_result) > 0) :
                                        foreach($sql_company_result as $value) :
                                ?>
                                    <option value="<?= $value['id']?>" selected><?= $value['name']?></option>
                                <?php
                                    endforeach;
                                    endif;
                                ?>
                            </select>
                            <label for="floatingInput">Company</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingInput" name="director" required>
                                <?php
                                    $sql_director = "SELECT DISTINCT e1.id, e1.first_name, e1.last_name
                                        FROM employees AS e1
                                        LEFT JOIN employees AS e2 ON e1.id = e2.super_visor_id
                                        WHERE e1.super_visor_id IS NULL OR e1.id = e2.super_visor_id";
                                    
                                    $sql_director_result = mysqli_query($conn, $sql_director);

                                    if (mysqli_num_rows($sql_director_result) > 0) :
                                        foreach ($sql_director_result as $value) :
                                        ?>
                                        <option value="<?= $value['id']?>">
                                            <?= $value['first_name'] . ' ' . $value['last_name'] ?>
                                        </option>
                                <?php
                                        endforeach;
                                    endif;
                                ?>
                            </select>
                            <label for="floatingInput">Select the Director</label>
                        </div>
                        <div class="input_cont d-flex justify-content-space-between gap-3 w-100">
                            <div class="form-floating mb-3 w-50">
                                <select class="form-select" id="floatingInput" name="country" required>
                                    <option value="armenia" selected>Armenia</option>
                                    <option value="usa">USA</option>
                                    <option value="france">France</option>
                                    <option value="russia">Russia</option>
                                </select>
                                <label for="floatingInput">Country</label>
                            </div>
                            <div class="form-floating mb-3 w-50">
                                <select class="form-select" id="floatingInput" name="position" required>
                                    <?php
                                        $sql_position = "SELECT * FROM positions";
                                        $sql_position_result = mysqli_query($conn, $sql_position);

                                        if (mysqli_num_rows($sql_position_result) > 0) :
                                            foreach($sql_position_result as $value) :
                                    ?>
                                        <option value="<?= $value['id']?>" selected><?= $value['p_name']?></option>
                                    <?php
                                        endforeach;
                                        endif;
                                        mysqli_close($conn);
                                    ?>
                                </select>
                                <label for="floatingInput">Position</label>
                            </div>
                            <div class="form-floating mb-3 w-50">
                                <input type="number" class="form-control" id="floatingInput" name="salary" placeholder="name@example.com" required>
                                <label for="floatingInput">Salary</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Chanel</button>
                            <button type="submit" name="create" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>