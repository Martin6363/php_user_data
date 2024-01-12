<?php
    include "../db/connect_db.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
        $employeeId = $_POST['id'];
    
        $query = "SELECT * FROM employees WHERE id = '$employeeId'";
        $result = mysqli_query($conn, $query);
        $employeeData = mysqli_fetch_assoc($result);
    
        header('Content-Type: application/json');
        echo json_encode($employeeData);
        exit;
    }

    if (isset($_POST['delete'])) {
        $id = isset($_POST['delete_id']) ? $_POST['delete_id'] : '';
 
        if (!empty($id)) {
            $id = mysqli_real_escape_string($conn, $id); 

            $query_delete_salaries = "DELETE FROM salaries WHERE emp_id = '$id'";
            $result_delete_salaries = mysqli_query($conn, $query_delete_salaries);

            $query = "DELETE FROM employees WHERE id = '$id'";
            $query_result = mysqli_query($conn, $query);

            if ($query_result) {
                header('Location: ../home/home.php');
                exit(); 
            } else {
                echo "Error deleting record: " . mysqli_error($conn);
            }
        } else {
            echo "Error: ID is empty.";
        }
        
        mysqli_close($conn);
    }
?>
