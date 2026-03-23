<div class="feed__post">
    <div class="post__header">
        <div class="header__author">
            <img class="author__avatar" src="<?= '../images/' .  $post['authorAvatar'] ?>" alt="Author avatar" width="32" height="32">
            <p class="author__name text"><?= $post['author'] ?></p>
        </div>
        <img class="header__edit-image" src="../images/edit.png" alt="Edit" width="20" height="20">
    </div>
    <div class="post__content">
        <div class="content__images">
            <img class="images__image" src="<?= '../images/' .  $post['images'][0] ?>" alt="Front image" width="474" height="474">
        </div>
        <img class="images__indicator" src="../images/indicator.png" alt="Indicator" width="44" height="24">
        <img class="content__reaction" src="../images/reaction.png" alt="Reaction" width="68" height="30">
        <p class="content__description-short text">
            <?= $post['description'] ?>
        </p>
        <a class="content__show-more text" title="Click to see more">ещё</a>
        <p class="content__time-ago text"><?php
            echo timeAgo($post['createdAt']);
            ?></p>
    </div>
</div>