<?php
session_start();
require_once('../validate/validate.php');
$file_name = '../upload/data.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $existing_data = json_decode(file_get_contents($file_name), true);
    $id = isset($existing_data)? end($existing_data)['id'] : 0;
    $id++;
    $first_name = isset($_POST['f_name']) ? $_POST['f_name'] : '';
    $last_name = isset($_POST['l_name']) ? $_POST['l_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $image = isset($_FILES['image']) ? $_FILES['image'] : '';
    $imageValidation = validateImage($image);
    
    $firstNameValidation = validateName($first_name, 'first name');
    $lastNameValidation = validateLastName($last_name, 'last name');
    $emailValidation = validateEmail($email);

    if ($imageValidation === true && $firstNameValidation === true && $lastNameValidation === true && $emailValidation === true) {
        $image_name = $id . '_' . basename($image['name']);
        $target_dir = '../upload/move_image/';
        $target_path = $target_dir . $image_name;
        if (move_uploaded_file($image['tmp_name'], $target_path)) {
            $new_data = [
                'id' => $id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'image_path' => $target_path,
            ];

            $existing_data[] = $new_data;
            $data_json = json_encode($existing_data);

            file_put_contents($file_name, $data_json);

            $_SESSION['message'] = "Data added successfully!";
            unset( $_SESSION['old_value']);
            header('Location: ../pages/createPage.php');
            exit();
        } else {
            $_SESSION['message'] = "Failed to move the image.";
        }
    } else {
        $_SESSION['message'] = $imageValidation;
    }
    if(isset($_SESSION['error_message'])){
        $_SESSION['old_value']['first_name'] = $first_name;
        $_SESSION['old_value']['last_name'] = $last_name;
        $_SESSION['old_value']['email'] = $email;
    }
    header('Location: ../pages/createPage.php');
    exit();
}

?>
