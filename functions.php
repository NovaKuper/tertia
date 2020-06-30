<?php

/**
 * Преобразует данные файла в массив
 * @param $filename string Название файла
 * @return false|array Возвращает массив данных
 */
function read_data_file ($filename){
    if (file_exists($filename)) {
        $data = array();
        $file_array = file($filename);
        foreach ($file_array as $row) {
            $data[] = explode(" :: ", $row);
        }
        return $data;
    } else {
        return false;
    }
}

/**
 * Формирует html таблицу на основе массива
 * @param $data array Массив данных
 * @return string Возвращает html таблицы
 */
function print_data_table ($data) {
    $total_sum = 0;
    $index = 1;
    $html = '';

    foreach ($data as $row) {
        $total_sum += $row[3]*$row[4];
        $html .= "<tr id='".$row[0]."'>";
        foreach ($row as $key => $col) {
            $html .= ($key == 0) ? '<th scope="row">' . $index++ . '</th>' : '<td>' . $col . '</td>';
        }
        $html .= "</tr>";
    }
    $html .= '<tr><th scope="row">Итого: </th><td colspan="4" id="total_sum">'.$total_sum.'</td></tr>';
    $html .= "<script>$('#table_cont tr').click(function () {
       $.ajax({
            type: 'GET',
            url: '/ajax/data_handler.php?action=del&row_id=' + $(this).attr('id'),
            success: function(data){
                $('#table_cont').html(data);
            }
        });
        return false;
    });</script>";
    return $html;
}

if (! function_exists("array_key_last")) {
    /**
     *
     * @param $array array Массив данных
     * @return int|NULL Возвращает индекс последнего элемента
     */
    function array_key_last($array) {
        if (!is_array($array) || empty($array)) {
            return NULL;
        }
        return array_keys($array)[count($array)-1];
    }
}