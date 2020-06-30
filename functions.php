<?php

/**
 * Преобразует данные файла в массив
 * @param $filename string Название файла
 * @return false|array Возвращает массив данных
 */
function read_data_file($filename)
{
    if (file_exists($filename)) {
        $data = array();
        $file_array = file($filename);
        foreach ($file_array as $row) {
            if (!empty(trim($row))) {
                $data[] = explode(" :: ", $row);
            }
        }
        return $data;
    } else {
        return false;
    }
}

if (!function_exists("array_key_last")) {
    /**
     * Возвращает индекс последнего элемента
     * @param $data array Массив данных
     * @return int|NULL Индекс последнего элемента
     */
    function array_key_last($data)
    {
        if (!is_array($data) || empty($data)) {
            return null;
        }
        return array_keys($data)[count($data) - 1];
    }
}

/**
 *
 * @param $key integer Ключ массива
 * @return
 */
function build_sorter($key)
{
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };
}

/**
 * Формирует html таблицу на основе массива
 * @param $data array Массив данных
 * @return string Возвращает html таблицы
 */
function print_data_table($data)
{
    $total_sum = 0;
    $html = '';

    foreach ($data as $row) {
        $total_sum += $row[3] * $row[4];
        $html .= "<tr class='element' row_id='" . $row[0] . "'>";
        foreach ($row as $key => $col) {
            $html .= ($key == 0) ? '<th scope="row">' . $col . '</th>' : '<td>' . $col . '</td>';
        }
        $html .= "</tr>";
    }
    if($total_sum > 0) {
        $html .= '<tr><th scope="row">Итого: </th><td colspan="4" id="total_sum">' . $total_sum . '</td></tr>';
    }

    $html .= '<script src="../script_for_new_str.js"></script>';
    return $html;
}

/**
 * Формирует html таблицу на основе массива
 * @param $filename string Путь к файлу
 * @param $row_id integer id строки
 * @return string|NULL Возвращает html подсказки, которая появляется при наведении
 */
function print_notice($filename, $row_id)
{
    $data = read_data_file($filename);
    $html = '';
    $arr_th = array(0 => "id", 1 => "Производитель", 2 => "Наименование", 3 => "Цена", 4 => "Количество");
    $key = array_search($row_id, array_column($data, 0));

    foreach ($data[$key] as $key => $col) {
        if (isset($arr_th[$key]) && $key != 0) {
            $html .= '<p>' . $arr_th[$key] .': '. $col . '</p>';
        }
    }
    return $html;
}