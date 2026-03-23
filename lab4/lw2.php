<?php
$digit = $_POST["digit"];

if (is_numeric($digit) && $digit >= 0 && $digit <= 9){//TODO защитиь без функций
    $digitName = ["Ноль", "Один", "Два", "Три", "Четыре", "Пять", "Шесть", "Семь", "Восемь", "Девять"];
    echo $digitName[$digit]; //TODO отформатировать массив в столбик
}
else{
    echo "Input Error";
}

