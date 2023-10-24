<?php
$numbers = [];
for ($i = 1; $i <= 10; $i++) {
    $numbers[] = $i;
}

$length = count($numbers);

for ($i = $length - 1; $i > 0; $i--) {
    $randomIndex = mt_rand(0, $i);
    $temp = $numbers[$i];
    $numbers[$i] = $numbers[$randomIndex];
    $numbers[$randomIndex] = $temp;
}

function customSort( $a, $b ) {
    if ( $a > $b ) return 1; 
    elseif ( $a < $b ) return -1; 
    elseif ( $a == $b ) return 0;
    else return 0;
}

function customRsort( $a, $b ) {
    if ( $a < $b ) return 1;
    elseif ( $a > $b ) return -1;
    elseif ( $a == $b ) return 0;
    else return 0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorting Numbers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        form {
            display: inline-block;
            margin: 10px;
        }

        pre {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Sort Random Numbers</h1>

    <form action="" method="get">
        <input type="submit" name="ascending_num" value="Small to Large">
    </form>
    <form action="" method="get">
        <input type="submit" name="decreasing_num" value="Large to Small">
    </form>

    <?php
        if (isset($_GET['ascending_num'])) {
            usort($numbers, 'customSort');
        } elseif (isset($_GET['decreasing_num'])) {
            usort($numbers, 'customRsort');
        }

        if (!empty($numbers)) {
            echo "<h2>Sorted Numbers</h2>";
            echo "<pre>";
            print_r($numbers);
            echo "</pre>";
        }
    ?>

</body>
</html>

