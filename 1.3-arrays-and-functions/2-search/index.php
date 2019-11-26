<?php
header('Content-Type: text/html; charset=utf-8');

$chairs = 50;
$map = generate(5, 8, $chairs); 
reserve($map, 1, 2); 
//reserveNearPlaces($map, 2);

function generate($rows, $placesPerRow, $avaliableCount){
    if (($rows*$placesPerRow) > $avaliableCount) {
        return false;
    } else {
        $rowScheme = array_fill(1, $placesPerRow, 'false');
        $hallScheme = array_fill(1, $rows, $rowScheme);
        return $hallScheme;
    };
};
        
function reserve(&$map, $row, $place){
    if ($map[$row][$place] === 'false') {
        $map[$row][$place] = 'true';
        return true;
    } else {
        return false;
    };
};

function reserveNearPlaces($map, $numOfPlaces) {
    $countRow = count($map);
    $countPlace = count($map[$countRow]);
    for ($i = 1; $i <= $countRow; $i++) { 
        $counter = $numOfPlaces;      
        for ($j = 1; $j <= $countPlace; $j++) {  
           if ($j + $numOfPlaces > $countPlace) {
           break;
          }; 
            if ($map[$i][$j] === 'false') {
                $counter--;
                if ($counter === 0) {
                    $firstPlace = $numOfPlaces - $j + 1;
                    return "Ряд $i, места c $firstPlace по $j";
                }
            }
            else $counter = $numOfPlaces;
        }    
       
    } 
    return "Подходящих мест не найдено";
}

echo reserveNearPlaces($map, 4);

/*
$reserve = reserve($map, $requiredRow, $requiredPlace);
logReserve($requiredRow, $requiredPlace, $reserve);
$reserve = reserve($map, $requiredRow, $requiredPlace);
logReserve($requiredRow, $requiredPlace, $reserve);
*/

function logReserve($row, $place, $result){
    if ($result) {
        //echo "Ваше место забронировано! Ряд $row, место $place<br/>".PHP_EOL;
    } else {
        //echo "Что-то пошло не так=( Бронь не удалась<br/>".PHP_EOL;
    }
}
