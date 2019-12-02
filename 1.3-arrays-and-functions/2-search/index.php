<?php
header('Content-Type: text/html; charset=utf-8');

$chairs = 50;
$map = generate(5, 8, $chairs); 

function generate($rows, $placesPerRow, $avaliableCount){
    if (($rows*$placesPerRow) > $avaliableCount) {
        return 'false';
    } else {
        $hallScheme = [];
        for($i = 0; $i < $rows; $i++){
            for($j = 0; $j < $placesPerRow; $j++) {
                $hallScheme[$i][$j] = 'false';
            } 
        }
        return $hallScheme;
    };
};
        
function reserve(&$map, $row, $place){
    if ($map[$row-1][$place-1] === 'false') {
        $map[$row-1][$place-1] = 'true';
        return 'true';
    } else {
        return 'false';
    };
};

function reserveNearPlaces($map, $numOfPlaces) {
    $countRow = count($map);
    $countPlace = count($map[0]);
    $seats = [];
    for ($i = 0; $i < $countRow; $i++) {  //для каждого ряда 
        $counter = 0;      
        for ($j = 0; $j < $countPlace; $j++) {  //для каждого места в ряду
          // if ($j > $countPlace - $numOfPlaces + 1) { //если место по номеру больше, чем количество мест минус мест для резервации плюс один
          // continue;
          //  }; 
            if ($map[$i][$j] === 'false') { // если место пустое
                $counter++;
                $seats[] = $j + 1;
            } else {
                //echo $i .','. $j;
                $counter = 0;
                $seats = [];
            }
                if ($counter === $numOfPlaces) {
                    return 'Ряд '.($i + 1).', места '. implode(', ', $seats) . '<br></br>';
                    continue;
                }
            }
            $counter = 0;
            $seats = [];
        }    
       
    return "Подходящих мест не найдено";
}
reserve($map, 1, 3); 
reserve($map, 2, 2); 
echo reserveNearPlaces($map, 5);

/*
$reserve = reserve($map, $requiredRow, $requiredPlace);
logReserve($requiredRow, $requiredPlace, $reserve);
$reserve = reserveNearPlaces($map, $numOfPlaces);
logReserve($requiredRow, $requiredPlace, $reserve);


function logReserve($row, $place, $result){
    if ($result) {
        echo "Ваше место забронировано! Ряд $row, место $place<br/>".PHP_EOL;
    } else {
        echo "Что-то пошло не так=( Бронь не удалась<br/>".PHP_EOL;
    }
}
*/
