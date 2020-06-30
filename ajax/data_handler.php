<?php
require_once("../functions.php");

$action = (isset($_REQUEST['action'])) ? $_REQUEST["action"] : '';
$filename = '../data.txt';

switch ($action) {
    case 'sort':
        $data = read_data_file($filename);
        $col_id = intval($_REQUEST['col_id']);
        usort($data, build_sorter($col_id));
        echo print_data_table($data);
        break;
    case 'notice':
        $row_id = intval($_REQUEST['row_id']);
        echo print_notice($filename, $row_id);
        break;
    case 'add':
        if (isset($_REQUEST['prod']) && isset($_REQUEST['name']) && isset($_REQUEST['price']) && isset($_REQUEST['amt'])) {
            $prod = htmlspecialchars(trim($_REQUEST['prod']));
            $name = htmlspecialchars(trim($_REQUEST['name']));
            $price = floatval($_REQUEST['price']);
            $amt = intval($_REQUEST['amt']);

            $data = read_data_file($filename);
            $all_ids = array_column($data, 0);
            $new_id = max($all_ids) + 1;
            $new_str = $new_id . ' :: ' . $prod . ' :: ' . $name . ' :: ' . $price . ' :: ' . $amt;

            file_put_contents($filename, PHP_EOL . $new_str, FILE_APPEND);

            $data[] = array($new_id, $prod, $name, $price, $amt);
            echo print_data_table($data);
        } else {
            echo "ERROR";
        }
        break;
    case 'del':
        if (isset($_REQUEST['row_id'])) {
            $data = read_data_file($filename);
            file_put_contents($filename, '');
            $key = array_search($_REQUEST['row_id'], array_column($data, 0));
            unset($data[$key]);
            foreach ($data as $i_row => $row) {
                $str = '';
                foreach ($row as $i_col => $col) {
                    if ($i_col == 0) {
                        $str .= $col;
                    } else {
                        $str .= ' :: ' . $col;
                    }
                }
                if ($i_row == 0) {
                    file_put_contents($filename, $str);
                } else {
                    file_put_contents($filename, $str, FILE_APPEND);
                }
            }
            echo print_data_table($data);
        } else {
            echo "ERROR";
        }
        break;
    default:
        $data = read_data_file($filename);
        echo print_data_table($data);
}