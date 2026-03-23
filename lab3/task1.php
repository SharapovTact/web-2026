<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $years = $_POST['years'] ?? '';
    echo "Вы ввели: " . htmlspecialchars($years) . " лет";
}
?>