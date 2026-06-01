<?php
function parseDate($date): ?array
{
    $separators = ['.', '-', '/'];
    $separator = null;

    foreach ($separators as $s) {
        if (strpos($date, $s) !== false) {
            $separator = $s;
            break;
        }
    }

    if (!$separator) return null;

    $parts = explode($separator, $date);
    if (count($parts) !== 3) return null;
    if (strlen($parts[0]) == 4) {
        return ['day' => (int)$parts[2], 'month' => (int)$parts[1], 'year' => (int)$parts[0]];
    } else {
        return ['day' => (int)$parts[0], 'month' => (int)$parts[1], 'year' => (int)$parts[2]];
    }
}

function getZodiacSign($day, $month): string
{
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

function isCorrectDateValue($d, $m, $y): bool
{
    if ($d <= 0 || $m <= 0 || $m > 12 || $y <= 0) return false;

    $daysInMonth = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    if (($y % 4 == 0 && $y % 100 != 0) || ($y % 400 == 0)) $daysInMonth[2] = 29;

    return $d <= $daysInMonth[$m];
}

if (isset($_POST["bornDate"])) {
    $dateData = parseDate($_POST["bornDate"]);

    if ($dateData && isCorrectDateValue($dateData['day'], $dateData['month'], $dateData['year'])) {
        echo getZodiacSign($dateData['day'], $dateData['month']);
    } else {
        echo "Input error";
    }
} else {
    echo "Input error";
}