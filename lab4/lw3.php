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
            if ($day >= 20) {
                $zodiacSign = "Водолей";
            } else {
                $zodiacSign = "Козерог";
            }
            break;
        case 2:
            if ($day >= 19) {
                $zodiacSign = "Рыбы";
            } else {
                $zodiacSign = "Водолей";
            }
            break;
        case 3:
            if ($day >= 21) {
                $zodiacSign = "Овен";
            } else {
                $zodiacSign = "Рыбы";
            }
            break;
        case 4:
            if ($day >= 20) {
                $zodiacSign = "Телец";
            } else {
                $zodiacSign = "Овен";
            }
            break;
        case 5:
            if ($day >= 21) {
                $zodiacSign = "Близнецы";
            } else {
                $zodiacSign = "Телец";
            }
            break;
        case 6:
            if ($day >= 21) {
                $zodiacSign = "Рак";
            } else {
                $zodiacSign = "Близнецы";
            }
            break;
        case 7:
            if ($day >= 23) {
                $zodiacSign = "Лев";
            } else {
                $zodiacSign = "Рак";
            }
            break;
        case 8:
            if ($day >= 23) {
                $zodiacSign = "Дева";
            } else {
                $zodiacSign = "Лев";
            }
            break;
        case 9:
            if ($day >= 23) {
                $zodiacSign = "Весы";
            } else {
                $zodiacSign = "Дева";
            }
            break;
        case 10:
            if ($day >= 23) {
                $zodiacSign = "Скорпион";
            } else {
                $zodiacSign = "Весы";
            }
            break;
        case 11:
            if ($day >= 22) {
                $zodiacSign = "Стрелец";
            } else {
                $zodiacSign = "Скорпион";
            }
            break;
        case 12:
            if ($day >= 22) {
                $zodiacSign = "Козерог";
            } else {
                $zodiacSign = "Стрелец";
            }
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
    if (strlen($date) == 10 && $date[2] == '.' && $date[5] == '.'
        && isNumber(substr($date, 0, 2))
        && isNumber(substr($date, 3, 2))
        && isNumber(substr($date, 6, 4))){
        return true;
    }
    return false;
}
function isCorrectDateValue($date){
    $day = getDay($date);
    $month = getMonth($date);
    $year = getYear($date);
    if ($day > 0 && $day <= 31
    && $month > 0 && $month <= 12
    && $year > 0){
        return true;
    }
    return false;
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

