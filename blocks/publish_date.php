<?php
$date = date('d ', $row->date); // Получаем день
$array = ["Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря"];
$monthIndex = date('n', $row->date) - 1; // Получаем индекс месяца (от 1 до 12) и уменьшаем на 1 для массива
$date .= $array[$monthIndex]; // Добавляем название месяца
$date .= date(' H:i', $row->date); // Добавляем время
?>