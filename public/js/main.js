let loaderWrapper = document.querySelector('.loader-wrapper');
let logo = document.querySelector('.loader');
let logoSpan = document.querySelectorAll('.loader-logo');

const hamburger = document.querySelector('.hamburger');
const navMenu = document.querySelector('.nav-menu');
const navLink = document.querySelectorAll(".nav-link");

window.addEventListener('DOMContentLoaded', ()=>{
    setTimeout(() => {
        logoSpan.forEach((span, idx)=>
        {
            setTimeout(() => {
                span.classList.add('active');
            }, (idx+1) * 400)
        });

        setTimeout(()=>
        {
            logoSpan.forEach((span, idx) =>
            {
                setTimeout(()=>{
                    span.classList.remove('active');
                    span.classList.add('fade');                    
                }, (idx + 1) * 50)
            })
        },2000);

        setTimeout(()=>
        {
            loaderWrapper.style.top = '-100vh';
        },3500)
    })
})

hamburger.addEventListener("click", mobileMenu);

function mobileMenu()
{
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

navLink.forEach(n => n.addEventListener("click", closeMenu));
function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}