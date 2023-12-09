<?php
require '../connectMySql.php';

if (isset($_GET['sort']) && isset($_GET['order'])) {
    $sort_order = isset($_GET['sort']) ? $_GET['sort'] : '';
    $sort_column = isset($_GET['column']) ? $_GET['column'] : '';

    $sql = "SELECT * FROM crud ORDER BY $sort_column $sort_order";
    $sql_run = mysqli_query($con, $sql);

    if ($sql_run) {
        $result = mysqli_fetch_all($sql_run, MYSQLI_ASSOC);

        foreach ($result as $userValue) {
           
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
    }  else {
        echo "<tr><td colspan='10'>Error fetching data: " . mysqli_error($con) . "</td></tr>";
    }
    } else {
        echo "<tr><td colspan='10'>Invalid parameters</td></tr>";
    }
    ?>
?>
