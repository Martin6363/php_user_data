<?php
$file_name = '../upload/data.json';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (empty($id)) return;

    $posts = [];
    $found = false;

    $file = fopen($file_name, 'r');

    if ($file) {
        while (!feof($file)) {
            $line = fgets($file);
            if ($line !== false) {
                $post = json_decode($line, true);
                if ($post !== null && isset($post['id']) && $post['id'] == $id) {
                    $found = true;
                    continue; 
                }

                $posts[] = $post;
            }
        }
        fclose($file);

        if ($found) {
            $file = fopen($file_name, 'w');
            if ($file) {
                foreach ($posts as $post) {
                    fwrite($file, json_encode($post) . PHP_EOL);
                }
                fclose($file);
            }
            header('Location: ../home/home.php');
            exit();
        }
    }
}
?>
