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
           post_id, user_id, description, likes, UNIX_TIMESTAMP(created_time)
       FROM posts
       WHERE post_id = $id
       SQL;
    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row ?: null;
}
function findImageInDatabase(PDO $connection, int $id): ?array {
    $query = <<<SQL
       SELECT
           image_id, path, display_order
       FROM images
       WHERE post_id = $id
       SQL;
    $statement = $connection->query($query);
    $row = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}
function findUserInDatabase(PDO $connection, int $id): ?array {
    $query = <<<SQL
       SELECT
           name, user_id, avatar_url
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
       WHERE image_id = $id
       SQL;
    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row ?: null;
}
function findPost(int $id): ?array {
    $connection = connectDatabase();
    $postInfo = findPostInDatabase($connection, $id);
    if ($postInfo) {
        $authorId = $postInfo['user_id'];
        $userInfo = findUserInDatabase($connection, $authorId);
        return [
            'postInfo' => $postInfo,
            'images'   => findImageInDatabase($connection, $id),
            'userInfo' => $userInfo,
        ];
    }
    return null;
}


