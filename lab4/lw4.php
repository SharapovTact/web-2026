<?php

function isLuckyTicket($ticket) {
    $firstPart = substr($ticket, 0, 3);
    $secondPart = substr($ticket, 3, 3);
    $sumOfDigitsPart1 = 0;
    $sumOfDigitsPart2 = 0;
    for ($i = 0; $i < (strlen($ticket) / 2); $i++) {
        $sumOfDigitsPart1 += (int)($firstPart[$i]);
        $sumOfDigitsPart2 += (int)($secondPart[$i]);
    }
    if ($sumOfDigitsPart1 === $sumOfDigitsPart2) {
        return true;
    }
    else {
        return false;
    }
}

function isNumber($number){
    for ($i = 0; $i < strlen($number); $i++){
        if ($number[$i] < '0' || $number[$i] > '9'){
            return false;
        }
    }
    return true;
}

function isCorrectTicket($ticket){
    if (isNumber($ticket) && strlen($ticket) == 6){
        return true;
    }
    return false;
}

if (isset($_POST["ticket1"]) && isset($_POST["ticket2"])){
    $ticket1 = $_POST["ticket1"];
    $ticket2 = $_POST["ticket2"];
    if (isCorrectTicket($ticket1) && isNumber($ticket2)) {
        $start = (int)$ticket1;
        $end = (int)$ticket2;

        for ($i = $start; $i <= $end; $i++) {
            if(isLuckyTicket((string)$i)) {
                echo $i, "<br>";
            }
        }
    }
    else{
        echo "Input error";
    }
}
else{
    echo "Input error";
}