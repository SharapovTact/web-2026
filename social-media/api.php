<?php

function getPostJson(): string {
    $dataAsJson = file_get_contents("php://input");
    if (!$dataAsJson) {
        echo 'Не удалось считать данные! <br>';
        return "";
    }
    return $dataAsJson;
}

function saveFile(string $file, string $data) {
    $myFile = fopen($file, 'w');
    if ($myFile) {
        $result = fwrite($myFile, $data);
        if ($result) {
            echo 'Данные успешно сохранены в файл <br>';
        } else {
            echo 'Произошла ошибка при сохранении данных в файл <br>';
        }
        fclose($myFile);
    } else {
        echo 'Произошла ошибка при открытии файла <br>';
    }
}

function saveImage(string $imageBase64) {
    $saveDir = './images/';
    $imageBase64Array = explode(';base64,', $imageBase64);
    $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
    $filePath = $saveDir . uniqid() . '.' . $imgExtention;
    $imageDecoded = base64_decode($imageBase64Array[1]);
    if ($imageDecoded === false) {
        die("Ошибка декодирования");
    }
    saveFile($filePath, $imageDecoded);
    echo "Файл сохранён";
}

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $json = getPostJson();
    $data = json_decode($json, true);
    $base64String = isset($data['image']) ? $data['image'] : null;
    if ($base64String != null) {
        saveImage($base64String);
    }
    else {
        echo "Файл не принят";
    }
}