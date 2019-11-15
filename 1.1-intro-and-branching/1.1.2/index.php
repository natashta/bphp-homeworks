<?php
    $time = date("H");
    $day = date("N");

    if($time >= 6 && $time < 11) {
        $message = "Доброе утро!";
        $image = 'img/morning.jpg';
    } elseif($time >= 11 && $time < 18) {
        $message = "Добрый день!";
        $image = 'img/day.jpg';
    } elseif($time >= 18 && $time < 23) {
        $message = "Добрый вечер!";
        $image = 'img/evening.jpg';
    } elseif(($time == 23)||($time >= 0 && $time < 6)) {
        $message = "Доброй ночи!";
        $image = 'img/night.jpg';
    }

    switch(date("N")){
        case 1:
            $day = 'понедельник';
            break;
        case 2:
            $day = 'вторник';
            break;
        case 3:
            $day = 'среда';
            break;
        case 4:
            $day = 'четверг';
            break;
        case 5:
            $day = 'пятница';
            break;
        case 6:
            $day = 'суббота';
            break;
        case 7:
            $day = 'воскресенье';
            break;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="img" style="background-image: url(<?= $image; ?>)">
        <div class="greeting">
            <h1><?= $message; ?></h1>
            <h2>Сегодня <?= $day ?> <?= $time ?> часов</h2>
        </div>
</body>
</html>