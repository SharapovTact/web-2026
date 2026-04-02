<?php
$username = isset($_GET['user']) ? $_GET['user'] : '';

$profiles = [
    '@vanya' => [
        'userId' => '@vanya',
        'name' => 'Ваня Денисов',
        'avatar' => 'ivan-avatar.png',
        'status' => 'Привет! Я системный аналитик в ACME :) 
                        Тут моя жизнь только для самых классных!',
        'images' => [
            'guy-stay-on-crossroad.jpg',
            'cake.png',
            'big-build.png',
            'a-lot-of-people.png',
            'coffee.png',
            'book.png',
            'suny-streed.jpg',
            'two-man.jpg',
            'goods-in-shop.jpg',
        ],
    ],
];

$profile = isset($profiles[$username]) ? $profiles[$username] : null;
if ($profile == null) {
    http_response_code(404);
    echo "Профиль не найден";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Profile <?= $profile['name'] ?></title>
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
    <?php include 'profile_preview.php'; ?>
</div>
</body>
</html>