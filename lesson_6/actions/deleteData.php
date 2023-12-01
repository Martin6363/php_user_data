<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id_to_delete = $_GET['id'];

    $file_name = '../upload/data.json';
    $existing_data = json_decode(file_get_contents($file_name), true);

    $index_to_delete = -1;
    foreach ($existing_data as $index => $data) {
        if ($data['id'] == $id_to_delete) {
            $index_to_delete = $index;
            break;
        }
    }

    if ($index_to_delete !== -1) {
        unset($existing_data[$index_to_delete]);
        $updated_data = array_values($existing_data);
        $updated_data_json = json_encode($updated_data);

        file_put_contents($file_name, $updated_data_json);

        $_SESSION['message'] = "Data deleted successfully!";
        header('Location: ../home/home.php');
        exit();
    } else {
        $_SESSION['message'] = "Invalid request for deletion";
        header('Location: ../home/home.php');
        exit();
    }
}
?>