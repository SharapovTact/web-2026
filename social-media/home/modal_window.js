function openModal(post, modalWindow, postPlaceholder) {
    const indicator = post.querySelector('.content__indicator');
    const btnLeft = post.querySelector('.content__slider-left');
    const btnRight = post.querySelector('.content__slider-right');
    const imagesContainer = post.querySelector('.content__images');
    const modalSliderWrapper = document.createElement('div');

    modalSliderWrapper.className = 'modal-slider-wrapper';
    modalSliderWrapper.style.position = 'relative';
    if (btnLeft) modalSliderWrapper.appendChild(btnLeft.cloneNode(true));
    if (btnRight) modalSliderWrapper.appendChild(btnRight.cloneNode(true));
    if (imagesContainer) modalSliderWrapper.appendChild(imagesContainer.cloneNode(true));
    if (indicator) modalSliderWrapper.appendChild(indicator.cloneNode(true));

    postPlaceholder.appendChild(modalSliderWrapper);
    modalWindow.style.display = 'flex';
    if (typeof initSlider === 'function') {
        initSlider(modalSliderWrapper);
    }
}

function closeModal(modalWindow, postPlaceholder) {
    modalWindow.style.display = 'none';
    postPlaceholder.innerHTML = '';
}

function initModalLogic() {
    const modalWindow = document.querySelector('.modal-window');
    const postPlaceholder = document.querySelector('.content__post-placeholder');
    const closeBtn = document.querySelector('.content__close-btn');
    const modalBackground = document.querySelector('.modal-window__background');
    const allPosts = document.querySelectorAll('.feed__post');

    allPosts.forEach(function(currentPost) {
        const imageContainer = currentPost.querySelector('.content__images');
        if (imageContainer) {
            imageContainer.addEventListener('click', function(e) {
                e.preventDefault()
                openModal(currentPost, modalWindow, postPlaceholder);
            });
        }
    });
    closeBtn.addEventListener('click', function() {
        closeModal(modalWindow, postPlaceholder);
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modalWindow.style.display === 'flex') {
            closeModal(modalWindow, postPlaceholder);
        }
    });
    modalBackground.addEventListener('click', function() {
        closeModal(modalWindow, postPlaceholder);
    });
}

initModalLogic();