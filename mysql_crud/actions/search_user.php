<?php
    require '../connectMySql.php';

    $search_value = $_GET['search'];
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    
    if (!empty($search_value)) {
        $sql = "SELECT * FROM crud WHERE f_name LIKE '$search_value%' OR l_name LIKE '$search_value%' OR email LIKE '$search_value%'";
    } else {
        $sql = "SELECT * FROM crud";
    }

    $pages_limit = isset($_GET['limit_page']) ? $_GET['limit_page'] : 5;
    $offset = ($page - 1) * $pages_limit;

    $sql .= " LIMIT $offset, $pages_limit";
    
    $query = mysqli_query($con, $sql);
    $data = '';

    if (mysqli_num_rows($query) > 0) {
        while($row = mysqli_fetch_assoc($query)) {
            $data .= "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['f_name']}</td>
                    <td>{$row['l_name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['country']}</td>
                    <td>{$row['phone_number']}</td>
                    <td>{$row['born']}</td>
                    <td>
                        <div class='action-table-box'>
                            <a href='../actions/viewData.php?id={$row['id']}' name='view_user' class='btn btn-info btn-sm'>View</a>
                            <a href='../actions/editData.php?id={$row['id']}' name='edit_user' class='btn btn-success btn-sm'>Edit</a>
                            <form action='../actions/deleteData.php' method='post' class='d-inline'>
                                <button class='btn btn-danger btn-sm' name='delete_user' value='{$row['id']}'>Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            ";
        }
        echo $data;
    } else {
        echo "<p class='h6 text-center w-100 mt-2'>No Result</p>";
    }
    

    mysqli_close($con);
?>
