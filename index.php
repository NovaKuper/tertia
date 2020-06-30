<?php
/*
Необходимо создать страницу с формой ввода данных и отображением сохраненных данных в виде таблицы: создать html форму
с полями ввода: "Производитель", "Наименование", "Цена", "Количество" и кнопкой "Добавить" при нажатии на "Добавить"
отправлять введенные данные на сервер ajax запросом при этом на сервере данные объединяются в строку и сохраняются в
текстовый файл
* обратно в браузер возвращаются все сохраненные данные на основе полученных с сервера данных необходимо
построить таблицу, колонки которой соответствуют полям ввода на форме внизу таблицы должна быть строка "Итого",
в ней нужно отображать сумму для колонок "Цена" и "Количество" при клике на название колонки таблица должна
сортироваться по этой колонке (без учета регистра символов) при наведении на строку рядом с курсором появляется
всплывающая подсказка с отображением данных товара при клике на строку с товаром он удаляется из таблицы и из данных
на сервере, "Итого" пересчитывается при открытии страницы сразу выполнять запрос на получение данных и отрисовывать
таблицу оформить страницу на свое усмотрение *
пример содержимого файла: 1 :: Apple :: iPhone 6S 32Gb :: 35000 :: 3 2 :: Apple :: iPhone SE 16Gb :: 30000 :: 6 3 :: Samsung :: Galaxy S7 32Gb :: 35000 :: 3 4 :: Samsung :: Galaxy S6 Edge 32Gb :: 30000 :: 2
*/
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <div class="row mt-3 ">
        <form class="mx-auto">
            <div class="form-group">
                <input type="email" class="form-control" id="" placeholder="Производитель">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="" placeholder="Наименование">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="" placeholder="Цена">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="" placeholder="Количество">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
    <div class="row mt-3">
        <?php
        $data = array();

        //убрать в функцию?
        $filename = 'data.txt';
        if (file_exists($filename)) {
            $file_array = file($filename);
            foreach ($file_array as $row) {
                $data[] = explode(" :: ", $row);
            }
            //echo "<pre>";print_r($data);echo "</pre>";
        }

        ?>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Производитель</th>
                <th scope="col">Наименование</th>
                <th scope="col">Цена</th>
                <th scope="col">Количество</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $row) {
                ?>
                <tr>
                    <?php
                    foreach ($row as $key => $col) {
                        echo ($key == 0) ? '<th scope="row">'.$col.'</th>' : '<td>'.$col.'</td>';
                    }
                    ?>
                </tr>
                <?
            }?>
            </tbody>
        </table>
        <div class="row">
            <table class="table table-border">
                <tbody>
                    <tr>
                        <th scope="row">Итого: </th>
                        <td id="total_sum">0</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>