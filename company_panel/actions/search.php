<?php
    include "../db/connect_db.php";
    include "../home/pagination.php";

    $search_value = isset($_GET['search']) ? $_GET['search'] : '';

    if (!empty($search_value)) {
        $sql = "SELECT 
        employees.id,
        employees.first_name,
        employees.last_name,
        employees.email,
        employees.dob,
        employees.create_at,
        companies.name AS company_name,
        companies.type AS company_type,
        positions.p_name AS position_name,
        companies.name AS company_name
        FROM 
            employees
        INNER JOIN 
            companies ON employees.company_id = companies.id
        INNER JOIN 
            departments ON companies.department_id = departments.id
        INNER JOIN 
            positions ON employees.position_id = positions.id
        WHERE first_name LIKE '$search_value%' OR last_name LIKE '$search_value%' OR email LIKE '$search_value%'
        LIMIT $start_from, $num_per_page";
    } else {
        $sql = "SELECT 
        employees.id,
        employees.first_name,
        employees.last_name,
        employees.email,
        employees.dob,
        employees.create_at,
        companies.name AS company_name,
        companies.type AS company_type,
        positions.p_name AS position_name,
        companies.name AS company_name
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
    }

    $result = mysqli_query($conn, $sql);

    $data = ''; 

    if (mysqli_num_rows($result) > 0) {
        while ($result_row = mysqli_fetch_assoc($result)) {                                          
            $data .= '
                <tr>
                    <th scope="row">' . $result_row['id'] . '</th>
                    <td>' . $result_row['first_name'] . '</td>
                    <td>' . $result_row['last_name'] . '</td>
                    <td>' . $result_row['email'] . '</td>
                    <td>' . $result_row['dob'] . '</td>
                    <td>' . $result_row['company_name'] . '</td>
                    <td>' . $result_row['create_at'] . '</td>
                    <td>
                        <div class="actions_table">
                            <input type="hidden" name="action_id" value="' . $result_row['id'] . '">
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
                </tr>';
        }
    }

    echo $data; 
?>
