function initSlider(post) {
    const images = post.querySelectorAll('.images__image');
    if (images.length <= 1) {
        return;
    }

    const nextBtn = post.querySelector('.content__slider-right');
    const prevBtn = post.querySelector('.content__slider-left');
    const indicator = post.querySelector('.indicator__current-photo-index');
    let currentIndex = 1;
    function update() {
        images.forEach((image, index) => {
            if (index === currentIndex - 1) {
                image.style.display = 'block';
            }
            else {
                image.style.display = 'none';
            }
        });
        indicator.textContent = (currentIndex) + '/' + images.length;
    }
    nextBtn.addEventListener("click", function() {
        if (currentIndex < images.length) {
            currentIndex++;
        }
        else {
            currentIndex = 1;
        }
        update();
    });
    prevBtn.addEventListener("click", function() {
        if (currentIndex > 1) {
            currentIndex--;
        }
        else {
            currentIndex = images.length;
        }
        update();
    });
    update();
}

const allPosts = document.querySelectorAll('.feed__post');
allPosts.forEach(function(currentPost) {
    initSlider(currentPost);
});