<?php
session_start();
require_once('../validate/validate.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $file_name = '../upload/data.json';

    $existing_data = json_decode(file_get_contents($file_name), true);

    $index_to_update = -1;
    foreach ($existing_data as $index => $data) {
        if ($data['id'] == $id) {
            $index_to_update = $index;
        }
    }

    if ($index_to_update !== -1) {
        $existing_data[$index_to_update]['first_name'] = $_POST['first_name'];
        $existing_data[$index_to_update]['last_name'] = $_POST['last_name'];
        $existing_data[$index_to_update]['email'] = $_POST['email'];

        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $target_dir = '../upload/move_image/';
            $image_name = "($id)" . '_' . basename($_FILES['image']['name']);
            $target_path = $target_dir . $image_name;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                $existing_data[$index_to_update]['image_path'] = $target_path;
            } else {
                $_SESSION['message'] = "Failed to move the new image.";
                header('Location: ../pages/editDataPage.php?id=' . $id);
                exit();
            }
        }

        file_put_contents($file_name, json_encode($existing_data));

        $_SESSION['message'] = "Data updated successfully";
        header('Location: ../home/home.php');
        exit();
    } else {
        $_SESSION['message'] = "Data not found for update.";
        header('Location: ../pages/editDataPage.php');
        exit();
    }
} else {
    $_SESSION['message'] = "Invalid request for update.";
    header('Location: ../pages/editDataPage.php');
    exit();
}


?>