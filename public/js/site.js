document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.main-nav');

    if (!toggle || !menu) return;

    toggle.addEventListener('click', () => {
        const opened = menu.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', opened ? 'true' : 'false');
        toggle.querySelector('span').textContent = opened ? '−' : '＋';
    });
});
