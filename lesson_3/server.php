<?php
session_start();

define('MAX_NUMBER_COUNT', 10);
define('MAX_NUMBER', 100);


if (!isset($_SESSION['numbers'])) {
    $_SESSION['numbers'] = generateRandomNumbers();
}

$action = isset($_GET['action']) ? $_GET['action'] : null;

if ($action === 'Small to Large') {
    usort($_SESSION['numbers'], 'smallToLarge');
} elseif ($action === 'Large to Small') {
    usort($_SESSION['numbers'], 'largeToSmall');
} elseif ($action === 'Random') {
    $_SESSION['numbers'] = generateRandomNumbers();
}


function generateRandomNumbers() {
    $randomNumbers = [];
    for ($i = 0; $i < MAX_NUMBER_COUNT; $i++) {
        $randomNumbers[] = rand(1, MAX_NUMBER);
    }
    return $randomNumbers;
}

function smallToLarge( $a, $b ) {
    if ( $a > $b ) return 1; 
    elseif ( $a < $b ) return -1; 
    elseif ( $a == $b ) return 0;
    else return 0;
}

function largeToSmall( $a, $b ) {
    if ( $a < $b ) return 1;
    elseif ( $a > $b ) return -1;
    elseif ( $a == $b ) return 0;
    else return 0;
}

header('Content-Type: application/json');
echo json_encode($_SESSION['numbers']);
exit();
?>
