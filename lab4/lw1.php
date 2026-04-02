<?php
function isNumber($number): bool {
    for ($i = 0; $i < strlen($number); $i++){
        if ($number[$i] < '0' || $number[$i] > '9'){
            return false;
        }
    }
    return true;
}

if (isset($_POST["year"])){
    $year = $_POST["year"];
}

if (!isset($_POST["year"]) || $year <= 0 || $year > 30000 || !isNumber($year)){
    echo "Input error";
}
else{
    if ($year % 400 === 0 || ($year % 100 != 0 && $year % 4 === 0)) {
        echo "YES";
    }
    else{
        echo "NO";
    }
}