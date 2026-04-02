<?php
$posts = [
    [
        'postId' => 1,
        'authorId' => '@vanya',
        'authorName' => 'Ваня Денисов',
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
        'postId' => 2,
        'authorId' => '@lisa',
        'authorName' => 'Лиза Дёмина',
        'authorAvatar' => 'liza-avatar.png',
        'description' => 'Сегодня я купила красивый цветок, завидуйте, хейтеры XDXD',
        'images' => [
            'flower-and-paper.png',
        ],
        'createdAt' => 127429614,
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