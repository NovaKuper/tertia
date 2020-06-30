<?php
require_once("../functions.php");

print_r($_REQUEST);

$action = (isset($_REQUEST['action'])) ? $_REQUEST["action"] : '';
$filename = '../data.txt';
echo $action;
$prod = trim($_REQUEST['prod']);
$name = trim($_REQUEST['name']);
$price = trim($_REQUEST['price']);
$amt = trim($_REQUEST['amt']);

switch ($action) {
    case 'sort':
        echo "i равно 0";
        break;
    case 'add':
        $data = read_data_file($filename);
        $row_amt = $data[array_key_last($data)][0] + 1;
        $new_str = $row_amt . ' :: ' . $prod . ' :: ' . $name . ' :: ' . $price . ' :: ' . $amt;
        file_put_contents($filename, PHP_EOL . $new_str, FILE_APPEND);
        $data[] = array($row_amt, $prod, $name, $price, $amt);
        echo print_data_table($data);
        break;
    case 'del':
        echo "i равно 2";
        break;
    default:
        $data = read_data_file($filename);
        echo print_data_table($data);
}