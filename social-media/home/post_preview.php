<div class="feed__post">
    <div class="post__header">
        <div class="header__author">
            <img class="author__avatar" src="<?= '../images/' .  $post['userAvatar']['image_id'] . '.' . $post['userAvatar']['extension']?>" alt="Author avatar" width="32" height="32">
            <a class="author__name text" href="../profile/?user=<?= $post['userInfo']['user_id'] ?>" title="Click to redirect on profile"><?= $post['userInfo']['name'] ?></a>
        </div>
        <div class="header__indicator">
            <img class="indicator__edit-image" src="../images/edit.png" alt="Edit" width="20" height="20">
        </div>
    </div>
    <div class="post__content">
        <?php if (sizeof($post['images']) > 1){ ?>
            <img class="content__indicator-image" src="../images/indicator.png" alt="Indicator" width="44" height="25">
            <img class="content__slider-right-image" src="../images/slider-button-right-on.png" alt="Slider right" width="20" height="20">
            <img class="content__slider-left-image" src="../images/slider-button-left-off.png" alt="Slider left" width="20" height="20">
        <?php } ?>
        <?php if (isset($post['images'])){
            foreach ($post['images'] as $image){?>
            <div class="content__images">
                <a href="<?= '../home/?postId=' . $post['postInfo']['post_id'] ?>">
                    <img class="images__image" src="<?= '../images/' .  $image['image_id'] . '.' . $image['extension'] ?>" alt="Front image" width="474" height="474">
                </a>
            </div>
            <?php } ?>
        <?php } ?>

        <img class="content__reaction" src="../images/reaction.png" alt="Reaction" width="68" height="30">
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