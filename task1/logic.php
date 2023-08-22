<?php
$data = [
    ['Иванов', 'Математика', 5],
    ['Иванов', 'Математика', 4],
    ['Иванов', 'Математика', 5],
    ['Петров', 'Математика', 5],
    ['Сидоров', 'Физика', 4],
    ['Иванов', 'Физика', 4],
    ['Петров', 'ОБЖ', 4]
];
// переделываем массив в такой формат иванов = ['математика' => 5], ['математика' => 4] и т.д.
foreach ($data as $item){
    $keyName = $item[0];
    $keySubject = $item[1];
    // считаем баллы
    $points[$keyName][$keySubject] = isset($points[$keyName][$keySubject]) ? $points[$keyName][$keySubject] + $item[2] : $item[2];
}
// сортируем по предметам и фамилиям
ksort($points);


foreach ($data as $item){
    $subject[] = $item[1];
}
// получаем названия предметов для атрибутов таблицы
$uniqueSubject = array_unique($subject);
asort($uniqueSubject);