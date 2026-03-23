<?php
$posts = [
        [
                'id' => 1,
                'author' => 'Ваня Денисов', //TODO Сделать ссылку на профиль автора, пусть оттуда всё буерут
                'authorAvatar' => 'ivan-avatar.png',
                'description' => 'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: 
                            «Поздно ночью, в уснувшей долине, на самом дне, в городке, занесенном 
                            снегом по ручку двери...',
                'images' => [
                        'guy-stay-on-crossroad.jpg',
                ],
                'createdAt' => 74296140,
        ],
        [
                'id' => 2,
                'author' => 'Лиза Дёмина',
                'authorAvatar' => 'liza-avatar.png',
                'description' => 'Сегодня я купила красивый цветок, завидуйте, хейтеры XDXD',
                'images' => [
                        'flower-and-paper.png',
                ],
                'createdAt' => 1274296140,
        ],
];
function timeAgo($timestamp) {
    $diff = time() - $timestamp;
    if ($diff < 60) return 'только что';
    if ($diff < 3600) return round($diff / 60) . ' мин назад';
    if ($diff < 86400) return round($diff / 3600) . ' ч назад';
    if ($diff < 2592000) return round($diff / 86400) . ' дн назад';
    return date('d.m.Y', $timestamp);
}
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./style.css">
        <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="page">
            <nav class="page__side-bar">
                <img class="side-bar__home-image side-bar__image" src="../images/home.png" alt="Home" width="40" height="40">
                <img class="side-bar__people-image side-bar__image" src="../images/people.png" alt="People" width="40" height="40">
                <img class="side-bar__plus-image side-bar__image" src="../images/plus.png" alt="Plus" width="40" height="40">
            </nav>
            <div class="page__feed">
                <?php
                foreach ($posts as $post) {
                    include 'post_preview.php';
                }
                ?>
            </div>
        </div>
    </body>
</html>