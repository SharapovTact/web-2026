<div class="feed__post">
    <div class="post__header">
        <div class="header__author">
            <img class="author__avatar" src="<?= '../images/' .  $post['authorAvatar'] ?>" alt="Author avatar" width="32" height="32">
            <a class="author__name text" href="../profile/?user=<?= $post['authorId'] ?>" title="Click to redirect on profile"><?= $post['authorName'] ?></a>
        </div>
        <div class="header__indicator">
            <img class="indicator__edit-image" src="../images/edit.png" alt="Edit" width="20" height="20">
        </div>
    </div>
    <div class="post__content">
        <?php if (isset($post['images'])){
            foreach ($post['images'] as $image){?>
            <div class="content__images">
                <a href="<?= '../home/?postId=' . $post['postId'] ?>">
                    <img class="images__image" src="<?= '../images/' .  $image ?>" alt="Front image" width="474" height="474">
                </a>
            </div>
            <?php } if (sizeof($post['images']) > 1){ ?>
                <img class="images__indicator" src="../images/indicator.png" alt="Indicator" width="44" height="24">
            <?php } ?>
        <?php } ?>

        <img class="content__reaction" src="../images/reaction.png" alt="Reaction" width="68" height="30">
        <?php if (!empty($post['description'])) { ?>
            <p class="content__description-short text"> <?= $post['description'] ?> </p>
            <a class="content__show-more text" title="Click to see more">ещё</a>
        <?php } ?>
        <p class="content__time-ago text">
            <?php
            echo timeAgo($post['createdAt']);
            ?></p>
    </div>
</div>