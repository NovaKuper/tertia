# Терция. Тестовое задание

Необходимо создать страницу с формой ввода данных и отображением сохраненных данных в виде таблицы: создать html форму с полями ввода: "Производитель", "Наименование", "Цена", "Количество" и кнопкой "Добавить" при нажатии на "Добавить" отправлять введенные данные на сервер ajax запросом при этом на сервере данные объединяются в строку и сохраняются в текстовый файл.
Обратно в браузер возвращаются все сохраненные данные на основе полученных с сервера данных необходимо построить таблицу, колонки которой соответствуют полям ввода на форме внизу таблицы должна быть строка "Итого", в ней нужно отображать сумму для колонок "Цена" и "Количество" при клике на название колонки таблица должна сортироваться по этой колонке (без учета регистра символов) при наведении на строку рядом с курсором появляется всплывающая подсказка с отображением данных товара при клике на строку с товаром он удаляется из таблицы и из данных на сервере, "Итого" пересчитывается при открытии страницы сразу выполнять запрос на получение данных и отрисовывать таблицу оформить страницу на свое усмотрение.

Пример содержимого файла: 
1 :: Apple :: iPhone 6S 32Gb :: 35000 :: 3 
2 :: Apple :: iPhone SE 16Gb :: 30000 :: 6 
3 :: Samsung :: Galaxy S7 32Gb :: 35000 :: 3 
4 :: Samsung :: Galaxy S6 Edge 32Gb :: 30000 :: 2