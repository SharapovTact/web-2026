<?php

function factorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}
if (isset($_POST["num"])){
    $num = $_POST["num"];
    if ($num >= 0){
        echo factorial($num);
    }
    else{
        echo "Input Error";
    }
}
else{
    echo "Input Error";
}
