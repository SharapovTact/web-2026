<?php
include 'data.php';
$postId = isset($_GET['postId']) ? $_GET['postId'] : '';
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
                if ($postId != '') {
                    $post = null;
                    foreach ($posts as $p) {
                        if ($p['postId'] == $postId) {
                            $post = $p;
                            break;
                        }
                    }
                    if ($post == null) {
                        header("Location: ../home"); //TODO сверстать страницу ошибки
                        exit;
                    }
                    include 'post_preview.php';
                }
                else{
                    foreach ($posts as $post) {
                        include 'post_preview.php';
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>