<?php
function connectDatabase(): PDO {
    $dsn = 'mysql:host=127.0.0.1;dbname=blog';
    $user = 'root';
    $password = '';
    return new PDO($dsn, $user, $password);
}

function findPostInDatabase(PDO $connection, int $id): ?array {
    $query = <<<SQL
       SELECT
           post_id, user_id, description, UNIX_TIMESTAMP(created_time)
       FROM posts
       WHERE post_id = $id
       SQL;
    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row ?: null;
}
function findImageInDatabase(PDO $connection, int $id): ?array {//TODO возвращается массив только с 1-й фоткой
    $query = <<<SQL
       SELECT
           image_id, extension
       FROM images
       WHERE post_id = $id
       SQL;
    $statement = $connection->query($query);
    $row = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $row ?: null;
}
function findUserInDatabase(PDO $connection, int $id): ?array {
    $query = <<<SQL
       SELECT
           name, user_id
       FROM users
       WHERE user_id = $id
       SQL;
    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row ?: null;
}
function findUserAvatar(PDO $connection, int $id): ?array {
    $query = <<<SQL
       SELECT
           image_id, extension
       FROM images
       WHERE user_id = $id
       SQL;
    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row ?: null;
}
function findPost(int $id): ?array {
    $postId = $id;
    $connection = connectDatabase();
    $postInfo = findPostInDatabase($connection, $postId);
    if ($postInfo) {
        $mas = [
            'postInfo' => $postInfo,
            'images'   => findImageInDatabase($connection, $postId),
            'userInfo' => findUserInDatabase($connection, $postId),
            'userAvatar' => findUserAvatar($connection, $postId),
        ];
        return $mas;
    }
    return null;
}


