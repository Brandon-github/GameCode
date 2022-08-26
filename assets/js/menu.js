const menu = document.querySelector('.menu');
const photo = document.querySelector('.nav__photo');

photo.addEventListener('click', () => {
    menu.classList.toggle('active');
});
