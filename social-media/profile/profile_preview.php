<div class="page__profile">
    <div class="profile__head">
        <img class="head__avatar" src="../images/<?= $profile['avatar'] ?>" alt="Avatar" width="123" height="123">
        <h1 class="head__name text"><?= $profile['name'] ?></h1>
        <p class="head__description text"><?= $profile['status'] ?></p>
        <img class="head__count-of-posts" src="../images/count-of-posts.png" alt="Count of posts" width="101" height="30">
    </div>
    <div class="profile__gallery">
        <img class="gallery__photo" src="../images/<?= $profile['images'][0] ?>" alt="Profile photo" width="322" height="322">
        <img class="gallery__photo" src="../images/<?= $profile['images'][1] ?>" alt="Profile photo" width="322" height="322">
        <img class="gallery__photo" src="../images/<?= $profile['images'][2] ?>" alt="Profile photo" width="322" height="322">
        <img class="gallery__photo" src="../images/<?= $profile['images'][3] ?>" alt="Profile photo" width="322" height="322">
        <img class="gallery__photo" src="../images/<?= $profile['images'][4] ?>" alt="Profile photo" width="322" height="322">
        <img class="gallery__photo" src="../images/<?= $profile['images'][5] ?>" alt="Profile photo" width="322" height="322">
        <img class="gallery__photo" src="../images/<?= $profile['images'][6] ?>" alt="Profile photo" width="322" height="322">
        <img class="gallery__photo" src="../images/<?= $profile['images'][7] ?>" alt="Profile photo" width="322" height="322">
        <img class="gallery__photo" src="../images/<?= $profile['images'][8] ?>" alt="Profile photo" width="322" height="322">
    </div>
</div>