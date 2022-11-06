let slideMenu = document.getElementById('slideMenu');

document.getElementById('menuIcon').addEventListener('click', () =>{
    slideMenu.style.width = 250 + 'px';
});

document.getElementById('closeMenu').addEventListener('click', () => {
    slideMenu.style.width = 0 + 'px';
    slideMenu.style.borderLeft = '0';
})
