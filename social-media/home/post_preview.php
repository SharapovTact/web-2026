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
        <?php
        $imagesCount = count($post['images']);
        $currentImageOrder = 1;
        if ($imagesCount > 1): ?>
            <div class="content__indicator text">
                <span class="indicator__current-photo-index"><?= $currentImageOrder ?>/<?= $imagesCount ?></span>
            </div>
            <button class="content__slider-left">
                <img class="slider-left__image arrow" src="../images/Arrow-left.png" alt="Slider left">
            </button>
            <button class="content__slider-right">
                <img class="slider-left__image arrow" src="../images/Arrow-right.png" alt="Slider right">
            </button>
        <?php endif; ?>
        <div class="content__images">
            <?php if (isset($post['images'])){
                usort($post['images'], function($a, $b) {
                    return $a['display_order'] <=> $b['display_order'];
                });
                foreach ($post['images'] as $image){?>
                    <a href="<?php if ($image['display_order'])'../home/?postId=' . $post['postInfo']['post_id'] ?>">
                        <img class="images__image" src="<?= $image['path'] ?>" alt="Front image">
                    </a>
                <?php }
            }?>
        </div>
        <?php if ($imagesCount > 0){?>
                <div class="content__like">
                    <button class="like__button">
                        <img class="button__heart-image" src="../images/like.png" alt="Like"></img>
                        <span class="button__count"><?= $post['postInfo']['likes'] ?></span>
                    </button>
                </div>
        <?php }?>
        <?php if (!empty($post['postInfo']['description'])) { ?>
            <p class="content__description-short text"> <?= $post['postInfo']['description'] ?> </p>
            <a class="content__show-more text" title="Click to see more">ещё</a>
        <?php } ?>
        <p class="content__time-ago text">
            <?php
            echo timeAgo($post['postInfo']['UNIX_TIMESTAMP(created_time)']);
            ?>
        </p>
    </div>
</div>
