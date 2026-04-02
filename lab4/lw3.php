<?php
function getDay($date){
    return (int)substr($date, 0, 2);
}
function getMonth($date){
    return (int)substr($date, 3, 5);
}
function getYear($date){
    return (int)substr($date, 6, 4);
}

function getZodiacSign($bornDate){
    $day = getDay($bornDate);
    $month = getMonth($bornDate);
    $zodiacSign = null;
    switch ($month) {
        case 1:
            $zodiacSign = $day >= 20 ? "Водолей" : "Козерог";
            break;
        case 2:
            $zodiacSign = $day >= 19 ? "Рыбы" : "Водолей";
            break;
        case 3:
            $zodiacSign = $day >= 21 ? "Овен" : "Рыбы";
            break;
        case 4:
            $zodiacSign = $day >= 20 ? "Телец" : "Овен";
            break;
        case 5:
            $zodiacSign = $day >= 21 ? "Близнецы" : "Телец";
            break;
        case 6:
            $zodiacSign = $day >= 21 ? "Рак" : "Близнецы";
            break;
        case 7:
            $zodiacSign = $day >= 23 ? "Лев" : "Рак";
            break;
        case 8:
            $zodiacSign = $day >= 23 ? "Дева" : "Лев";
            break;
        case 9:
            $zodiacSign = $day >= 23 ? "Весы" : "Дева";
            break;
        case 10:
            $zodiacSign = $day >= 23 ? "Скорпион" : "Весы";
            break;
        case 11:
            $zodiacSign = $day >= 22 ? "Стрелец" : "Скорпион";
            break;
        case 12:
            $zodiacSign = $day >= 22 ? "Козерог" : "Стрелец";
            break;
    }
    return $zodiacSign;
}
function isNumber($number){
    for ($i = 0; $i < strlen($number); $i++){
        if ($number[$i] < '0' || $number[$i] > '9'){
            return false;
        }
    }
    return true;
}
function isCorrectFormat($date){
    if (strlen($date) == 10 && !isNumber($date[2]) && !isNumber($date[5])
        && isNumber(substr($date, 0, 2))
        && isNumber(substr($date, 3, 2))
        && isNumber(substr($date, 6, 4))){
        return true;
    }
    return false;
}
function isCorrectDateValue($date): bool{
    $day = getDay($date);
    $month = getMonth($date);
    $year = getYear($date);
    if ($day <= 0 || $month <= 0 || $month > 12 || $year <= 0) {
        return false;
    }
    switch ($month) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            return $day <= 31;
        case 4:
        case 6:
        case 9:
        case 11:
            return $day <= 30;
        case 2:
            $isLeapYear = ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
            $maxDays = $isLeapYear ? 29 : 28;
            return $day <= $maxDays;
        default:
            return false;
    }
}
function isCorrectDateInput($date){
    if (isCorrectFormat($date) && isCorrectDateValue($date)){
        return true;
    }
    return false;
}

if (isset($_POST["bornDate"])){
    $bornDate = $_POST["bornDate"];
}
if (!isset($_POST["bornDate"]) || !isCorrectDateInput($bornDate)){
    echo "Input error";
}
else{
    $zodiac = getZodiacSign($bornDate);
    echo $zodiac;
}

