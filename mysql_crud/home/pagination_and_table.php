<?php
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    $pages_limit = isset($_GET['limit_page']) ? $_GET['limit_page'] : 5;
    $this_page_first_results = ($page - 1) * $pages_limit;

    $sql = "SELECT * FROM crud";
    $sql_run = mysqli_query($con, $sql);
    $number_of_results = mysqli_num_rows($sql_run);
    $number_of_pages = ceil($number_of_results / $pages_limit);
    
    $sql = "SELECT * FROM crud LIMIT $this_page_first_results, $pages_limit";
    $sql_run = mysqli_query($con, $sql);

    if ($number_of_results > 0) {
        foreach ($sql_run as $userValue) {
?>
        <tr>
            <td><?= $userValue['id']; ?></td>
            <td><?= $userValue['f_name']; ?></td>
            <td><?= $userValue['l_name']; ?></td>
            <td><?= $userValue['age']; ?></td>
            <td><?= $userValue['email']; ?></td>
            <td><?= $userValue['gender']; ?></td>
            <td><?= $userValue['country']; ?></td>
            <td><?= $userValue['phone_number']; ?></td>
            <td><?= $userValue['born']; ?></td>
            <td>
                <div class="action-table-box">
                    <a href="../actions/viewData.php?id=<?= $userValue['id']; ?>" name="view_user" class="btn btn-info btn-sm">View</a>
                    <a href="../actions/editData.php?id=<?= $userValue['id']; ?>" name="edit_user" class="btn btn-success btn-sm">Edit</a>
                    <form action="../actions/deleteData.php" method="post" class="d-inline">
                        <button class="btn btn-danger btn-sm" name="delete_user" value="<?= $userValue['id']; ?>">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
<?php
        }
    } else {
        echo "<h5> No Record Found </h5>";
    }
?>
