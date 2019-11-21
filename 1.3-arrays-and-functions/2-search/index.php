<?php
$chairs = 50;
$map = generate(5, 8, $chairs);
$requiredRow = 4;
$requiredPlace = 1;

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
    $vacantPlaces = 0;
    for ($i = 1; $i <= count($map); $i++) {           
        for ($j = 1; $j <= count($map[$i]); $j++) {   
            if ($map[$i][$j] === 'true') {
                $vacantPlaces = 0;
            }; 
            if ($map[$i][$j] === 'false') {
                $vacantPlaces++;
                if ($vacantPlaces === $numOfPlaces) {
                    $firstPlace = $j - $numOfPlaces + 1;
                    echo "Ряд $i, места c $firstPlace по $j";
                };
            };  
        };
    }; 
};
reserveNearPlaces($map, 4);

$reserve = reserve($map, $requiredRow, $requiredPlace);
logReserve($requiredRow, $requiredPlace, $reserve);
$reserve = reserve($map, $requiredRow, $requiredPlace);
logReserve($requiredRow, $requiredPlace, $reserve);

function logReserve($row, $place, $result){
    if ($result) {
        //echo "Ваше место забронировано! Ряд $row, место $place<br/>".PHP_EOL;
    } else {
        //echo "Что-то пошло не так=( Бронь не удалась<br/>".PHP_EOL;
    }
}
