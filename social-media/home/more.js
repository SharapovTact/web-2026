document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.content__show-more');

    buttons.forEach(btn => {
        const desc = btn.previousElementSibling;
        if (desc.scrollHeight > desc.clientHeight) {
            btn.style.display = 'block';
        }
    });
});

document.addEventListener('click', (e) => {
    const btn = e.target;
    if (btn.matches('.content__show-more')) {
        e.preventDefault();

        const desc = btn.previousElementSibling;
        if (desc.style.webkitLineClamp === 'unset') {
            desc.style.webkitLineClamp = '2';
            btn.textContent = 'ещё';
        } else {
            desc.style.webkitLineClamp = 'unset';
            btn.textContent = 'Свернуть';
        }
    }
});