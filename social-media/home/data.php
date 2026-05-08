<?php
include 'sql_post.php';
$posts = [];
$postCount = 2;
for ($i = 0; $i < $postCount; $i++) {
    $posts[$i] = findPost($i + 1);
}

function timeAgo(int $timestamp) { //TODO Вынести в константы числа
    $diff = time() - $timestamp;
    if ($diff < 60) return 'только что';
    if ($diff < 3600) return round($diff / 60) . ' мин назад';
    if ($diff < 86400) return round($diff / 3600) . ' ч назад';
    if ($diff < 2592000) return round($diff / 86400) . ' дн назад';
    return date('d.m.Y', $timestamp);
}
?>