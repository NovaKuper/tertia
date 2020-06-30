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

/**
 * Кастомная функция сортировки многомерного массива
 * @param $key integer по этому полю сортировать
 * @return
 */
function build_sorter_ASC($key)
{
    return function ($a, $b) use ($key) {
        if (is_numeric($b[$key]) && is_numeric($a[$key])) {
            return (($a[$key]+ 0) - ($b[$key]+ 0));
        } else {
            return strcasecmp($a[$key], $b[$key]);
        }
    };
}

function build_sorter_DESC($key)
{
    return function ($a, $b) use ($key) {
        if (is_numeric($b[$key]) && is_numeric($a[$key])) {
            return (($b[$key]+ 0) - ($a[$key]+ 0));
        } else {
            return strcasecmp($b[$key], $a[$key]);
        }
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