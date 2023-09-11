<?php

function studentsReduce(array &$data) : void {
    $result = [];

    foreach ($data as $student) {
        [$name, $subject, $grade] = $student;
        if (!isset($result[$name][$subject]))
            $result[$name][$subject] = $grade;
        else
            $result[$name][$subject] += $grade;
    }
    $data = $result;
}

$data = [
    ['Иванов', 'Математика', 5],
    ['Иванов', 'Математика', 4],
    ['Иванов', 'Математика', 5],
    ['Петров', 'Математика', 5],
    ['Сидоров', 'Физика', 4],
    ['Иванов', 'Физика', 4],
    ['Петров', 'ОБЖ', 4],
];


// studentReduce – схлопывает массивы, делая фамилии уникальными ключами,
// а значения - ассоциативными массивами с предметами в качестве ключей и оценками в качестве значений
studentsReduce($data);
ksort($data);

require 'index.tpl.php';
