const menuIcon = document.querySelector('#menu-icon');
const sidebar = document.querySelector('.sidebar');
let menu = document.querySelector('.menu');
const menuList = document.querySelector('.menu-list');
const closeBtn = document.querySelector('.close-btn');




function showSidebar(){
    sidebar.style.display = 'block';
    menu.style.display = 'block';
    menuIcon.style.display = 'none';
    menuList.style.display = 'none';
}

function hideSidebar(){
    sidebar.style.display = 'none';
    menu.style.display = 'none';
    menuIcon.style.display = 'block';
    menuList.style.display = 'block';
}

const navbar = document.querySelector('nav');

let scrollY = window.scrollY;

window.addEventListener('scroll', function (){
    if (this.scrollY > 300){
        navbar.classList.add('bgchange');
        navbar.style.transition = '.5s';

    } else {
        navbar.classList.remove('bgchange');
       
    }
})





