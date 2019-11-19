<?php

//Доп 1
$input = 'http://example.com';

$sample = 'https://';
$output = substr($input, 0, 8);

$position = strpos($input, $sample);

if ($output === $sample) {
    echo 'Да<br/>';
} else {
    echo 'Нет<br/>';
}

if ($position === false) {
    echo 'Нет<br/>';
} else {
    echo 'Да<br/>'; 
}
echo '<br/>';

//Доп.2
$inputDate = '05-29-1993';
$changeStr = str_replace('-', '', $inputDate);
$day = substr($changeStr, 2, 2);
$month = substr($changeStr, 0, 2);
$year = substr($changeStr, -4, 4);
echo ($day.'.'.$month.'.'.$year.'<br>');
echo '<br/>';

//Доп 3
$currency = 1010536;
$currency = substr_replace($currency, ' ', -6, 0);
$currency = substr_replace($currency, ' ', -3, 0);
echo ($currency.' руб.');
