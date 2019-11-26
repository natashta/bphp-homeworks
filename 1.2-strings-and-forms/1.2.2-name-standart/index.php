<?php
header('Content-Type: text/html; charset=utf-8');
function mb_ucfirst($str) {
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc.mb_substr($str, 1);
}

$fname = mb_ucfirst($_POST['firstName']);
$lname = mb_ucfirst($_POST['lastName']);
$mname = mb_ucfirst($_POST['middleName']);

$fullName = ($lname).' '.($fname).' '.($mname);
$surnameAndInitials = $lname.'.'.mb_substr($fname, 0, 1).'.'.mb_substr($mname, 0, 1);
$fio = mb_substr($fname, 0, 1).mb_substr($fname, 0, 1).mb_substr($mname, 0, 1);

echo "Полное имя: $fullName<br/>";
echo "Фамилия и инициалы: $surnameAndInitials<br/>";
echo "Аббревиатура: $fio<br/>";
