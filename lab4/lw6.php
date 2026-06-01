<?php
function calc($expression) {
    $elements = explode(' ', $expression);
    $stack = [];
    foreach ($elements as $element) {
        if (is_numeric($element)) {
            $stack[] = (int)$element;
        }
        else if ($element == '+' or $element == '-' or $element == '*') {
            $b = array_pop($stack);
            $a = array_pop($stack);

            switch ($element) {
                case '+':
                    $stack[] = $a + $b;
                    break;
                case '-':
                    $stack[] = $a - $b;
                    break;
                case '*':
                    $stack[] = $a * $b;
                    break;
            }
        }
        else {
            return null;
        }
    }
    if (sizeof($stack) > 1){
        return null;
    }
    return array_pop($stack);
}

if (isset($_POST["expression"])){
    $value = calc($_POST["expression"]);
    if ($value == null){
        echo "Input Error";
    }
    else {
        echo $value;
    }
}
else {
    echo "Input Error";
}