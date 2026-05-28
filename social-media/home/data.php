<?php
include 'sql_post.php';

function getPostsCount(PDO $connection): int {
    $query = <<<SQL
        SELECT COUNT(*) FROM posts
        SQL;
    $statement = $connection->query($query);
    return (int)$statement->fetchColumn();
}

$posts = [];
$postCount = getPostsCount(connectDatabase());
for ($i = 0; $i < $postCount; $i++) {
    $posts[$i] = findPost($i + 1);
}

function timeAgo(int $timestamp) {
    $diff = time() - $timestamp;
    if ($diff < 60) return 'только что';
    if ($diff < 3600) return round($diff / 60) . ' мин назад';
    if ($diff < 86400) return round($diff / 3600) . ' ч назад';
    if ($diff < 2592000) return round($diff / 86400) . ' дн назад';
    return date('d.m.Y', $timestamp);
}
?>