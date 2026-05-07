<div class="feed__post">
    <div class="post__header">
        <div class="header__author">
            <img class="author__avatar" src="<?= $post['userInfo']['avatar_url']?>" alt="Author avatar">
            <a class="author__name text" href="../profile/?user=<?= $post['userInfo']['user_id'] ?>" title="Click to redirect on profile"><?= $post['userInfo']['name'] ?></a>
        </div>
        <div class="header__indicator">
            <img class="indicator__edit-image" src="../images/edit.png" alt="Edit">
        </div>
    </div>
    <div class="post__content">
        <?php if (sizeof($post['images']) > 1){ ?>
            <img class="content__indicator-image" src="../images/indicator.png" alt="Indicator">
            <img class="content__slider-right-image" src="../images/slider-button-right-on.png" alt="Slider right">
            <img class="content__slider-left-image" src="../images/slider-button-left-off.png" alt="Slider left">
        <?php } ?>
        <?php if (isset($post['images'])){
            usort($post['images'], function($a, $b) {
                return $a['display_order'] <=> $b['display_order'];
            });
            foreach ($post['images'] as $image){?>
            <div class="content__images">
                <a href="<?php if ($image['display_order'])'../home/?postId=' . $post['postInfo']['post_id'] ?>">
                    <img class="images__image" src="<?= '../images/' .  $image['image_id'] . '.' . $image['extension'] ?>" alt="Front image">
                </a>
            </div>
            <?php } ?>
        <?php } ?>
        <button class="content__like-button">
            <img class="like-button__heart-image" src="../images/like.png" alt="Like"></img>
            <span class="like-button__count"><?= $post['postInfo']['likes'] //TODO Ограничить ?></span>
        </button>
        <?php if (!empty($post['postInfo']['description'])) { ?>
            <p class="content__description-short text"> <?= $post['postInfo']['description'] ?> </p>
            <a class="content__show-more text" title="Click to see more">ещё</a>
        <?php } ?>
        <p class="content__time-ago text">
            <?php
            echo timeAgo($post['postInfo']['UNIX_TIMESTAMP(created_time)']);
            ?></p>
    </div>
</div>