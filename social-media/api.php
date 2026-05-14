<?php

function connectDatabase(): PDO {
    $dsn = 'mysql:host=127.0.0.1;dbname=blog';
    $user = 'root';
    $password = '';
    return new PDO($dsn, $user, $password);
}

function getPostJson(): string {
    $dataAsJson = file_get_contents("php://input");
    if (!$dataAsJson) {
        echo 'Не удалось считать данные! <br>';
        return "";
    }
    return $dataAsJson;
}

function saveFile(string $file, string $data): bool {
    $myFile = fopen($file, 'w');
    if ($myFile) {
        $result = fwrite($myFile, $data);
        if ($result) {
            echo 'Данные успешно сохранены в файл <br>';
        } else {
            echo 'Произошла ошибка при сохранении данных в файл <br>';
            return false;
        }
        fclose($myFile);
    } else {
        echo 'Произошла ошибка при открытии файла <br>';
        return false;
    }
    return true;
}

function saveImageWithId(string $imageBase64, int $imageId): string {
    $saveDir = './images/';
    if (!is_dir($saveDir)) mkdir($saveDir, 0777, true);

    $imageBase64Array = explode(';base64,', $imageBase64);
    $extension = str_replace('data:image/', '', $imageBase64Array[0]);

    $fileName = $imageId . '.' . $extension;
    $filePath = $saveDir . $fileName;

    $imageDecoded = base64_decode($imageBase64Array[1]);
    if ($imageDecoded === false) {
        die("Ошибка декодирования");
    }
    if (saveFile($filePath, $imageDecoded)){
        echo "Файл сохранён";
        return '.' . $filePath;
    }
    return "";
}

function savePostToDatabase(PDO $connection, array $postParams): int {
    $query = <<<SQL
        INSERT INTO posts (user_id, description, created_time)
        VALUES (?, ?, NOW())
        SQL;
    $statement = $connection->prepare($query);
    $statement->execute([
        $postParams['user_id'],
        $postParams['description']
    ]);
    return (int)$connection->lastInsertId();
}

function createEnterImage(PDO $connection, int $postId, int $order): int {
    $query = <<<SQL
        INSERT INTO images (post_id, path, display_order)
        VALUES (?, 'none', ?)
        SQL;
    $statement = $connection->prepare($query);
    $statement->execute([$postId, $order]);
    return (int)$connection->lastInsertId();
}

function updateImagePath(PDO $connection, int $imageId, string $path): void {
    $query = <<<SQL
        UPDATE images SET path = ? WHERE image_id = ?
        SQL;
    $statement = $connection->prepare($query);
    $statement->execute([$path, $imageId]);
}

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $db = connectDatabase();
    $json = getPostJson();
    $data = json_decode($json, true);
    $images = isset($data['images']) ? $data['images'] : [];
    $maxPhotos = 3;
    $postParams = [
        'user_id' => 1,
        'description' => isset($data['description']) ? $data['description'] : null,
    ];
    try {
        $db->beginTransaction();
        $postId = savePostToDatabase($db, $postParams);
        foreach ($images as $index => $base64String) {
            if ($index >= $maxPhotos) break;
            $imageId = createEnterImage($db, $postId, $index);
            $finalPath = saveImageWithId($base64String, $imageId);
            if ($finalPath !== "") {
                updateImagePath($db, $imageId, $finalPath);
            } else {
                throw new Exception("Не удалось сохранить изображение под номером " . ($index + 1));
            }
        }
        $db->commit();
        echo "Пост успешно создан. ID поста: $postId";
    } catch (Exception $exception) {
        $db->rollBack();
        echo "Ошибка: " . $exception->getMessage();
    }
}


