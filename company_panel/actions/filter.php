<?php
include "../db/connect_db.php";
require_once "../home/pagination.php";


if (isset($_GET['filter_position']) || isset($_GET['filter_gender'])) {
    $position_id = $_GET['filter_position'];
    $filter_gender = $_GET['filter_gender'];

    if ($position_id == 'Employees') {
        $query = "SELECT 
            employees.id,
            employees.first_name,
            employees.last_name,
            employees.email,
            employees.dob,
            employees.phone_number,
            employees.gender,
            employees.create_at,
            employees.country,
            companies.name AS company_name,
            companies.type AS company_type,
            positions.p_name AS position_name
        FROM 
            employees
        INNER JOIN 
            companies ON employees.company_id = companies.id
        INNER JOIN 
            departments ON companies.department_id = departments.id
        INNER JOIN 
            positions ON employees.position_id = positions.id
        WHERE employees.id != employees.super_visor_id";

        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
    } elseif ($position_id == 'Directors') {
        $query = "SELECT DISTINCT
            employees.id,
            employees.first_name,
            employees.last_name,
            employees.email,
            employees.dob,
            employees.phone_number,
            employees.gender,
            employees.create_at,
            employees.country,
            companies.name AS company_name,
            companies.type AS company_type,
            positions.p_name AS position_name
        FROM 
            employees 
        INNER JOIN 
            companies ON employees.company_id = companies.id
        INNER JOIN 
            departments ON companies.department_id = departments.id
        INNER JOIN 
            positions ON employees.position_id = positions.id
        LEFT JOIN employees AS e2 ON employees.id = e2.super_visor_id
        WHERE (employees.super_visor_id IS NULL OR employees.id = e2.super_visor_id)";

            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);
            
    } elseif ($position_id) {
        $query = "SELECT DISTINCT
            employees.id,
            employees.first_name,
            employees.last_name,
            employees.email,
            employees.dob,
            employees.phone_number,
            employees.gender,
            employees.create_at,
            employees.country,
            companies.name AS company_name,
            companies.type AS company_type,
            positions.p_name AS position_name
        FROM 
           employees 
        INNER JOIN 
           companies ON employees.company_id = companies.id
        INNER JOIN 
           departments ON companies.department_id = departments.id
        INNER JOIN 
           positions ON employees.position_id = positions.id
        WHERE positions.id = $position_id";

        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
    } elseif ($position_id == 'All') {
        $query = "SELECT 
            employees.id,
            employees.first_name,
            employees.last_name,
            employees.email,
            employees.dob,
            employees.phone_number,
            employees.gender,
            employees.create_at,
            employees.country,
            companies.name AS company_name,
            companies.type AS company_type,
            positions.p_name AS position_name
        FROM 
            employees
        INNER JOIN 
            companies ON employees.company_id = companies.id
        INNER JOIN 
            departments ON companies.department_id = departments.id
        INNER JOIN 
            positions ON employees.position_id = positions.id
        ORDER BY employees.id DESC
        LIMIT $start_from, $num_per_page";

      $result = mysqli_query($conn, $query);
      $count = mysqli_num_rows($result);
    } 
    
    if ($filter_gender != 'All') {
        $query = "SELECT 
        employees.id,
        employees.first_name,
        employees.last_name,
        employees.email,
        employees.dob,
        employees.phone_number,
        employees.gender,
        employees.create_at,
        employees.country,
        companies.name AS company_name,
        companies.type AS company_type,
        positions.p_name AS position_name
        INNER JOIN 
            companies ON employees.company_id = companies.id
        INNER JOIN 
            departments ON companies.department_id = departments.id
        INNER JOIN 
            positions ON employees.position_id = positions.id
        FROM 
            employees
        WHERE employees.gender = '$filter_gender'";

        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
    }
        if ($count) :
            while ($row = mysqli_fetch_assoc($result)) :
?>
                <tr>
                    <th scope="row"><?= $row['id'] ?></th>
                    <td><?= $row['first_name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['dob'] ?></td>
                    <td><?= $row['company_name'] ?></td>
                    <td><?= $row['create_at'] ?></td>
                    <td>
                        <div class="actions_table">
                            <input type="hidden" name="action_id" value="<?= $row['id'] ?>">
                            <button type="button" class="btn btn-info btn-sm viewBtn" data-bs-target="#exampleModal4" data-bs-toggle="modal">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-sm editBtn" data-bs-target="#exampleModal2" data-bs-toggle="modal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm deleteBtn" data-bs-target="#exampleModal3" data-bs-toggle="modal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
<?php             
        endwhile;
    endif;
    mysqli_close($conn);
    }
?>
