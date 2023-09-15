const menuButton = document.getElementById("menu-bar");
const menuCloseButton = document.getElementById("menuCloseBtn");
const menuList = document.querySelector(".menu-list");
const logo = document.querySelector(".logo");
const contactInfo = document.querySelector(".contact-info");
const header = document.querySelector("header");
const topSearchBar = document.querySelector(".search");
const cartCount = document.querySelector(".cart-count");


menuButton.addEventListener('click',()=>{
    menuList.style.cssText="display:flex" 
    document.body.style.cssText="overflow-y:hidden"
    menuButton.style.cssText="display:none"
    logo.style.cssText="display:none"
    header.style.cssText="background-color: #fff;height: 100vh;padding-top:3em";
    topSearchBar.style.cssText="display:none";
    cartCount.style.cssText="display:none";
   
        if (window.pageYOffset >= 0) {
          header.style.backgroundColor = '#fff7ea';
        } else {
          header.style.backgroundColor = 'transparent';
        }
    
})
menuCloseButton.addEventListener('click',()=>{
    menuList.style.cssText="display:none"
    
    menuButton.style.cssText="display:flex"
    logo.style.cssText="display:flex"
    topSearchBar.style.cssText="display:flex";
    cartCount.style.cssText="display:flex";
    document.body.style.cssText="overflow-y:visible"
    header.style.cssText="background-color: unset;height: auto;padding-top:0"
    if (window.pageYOffset > 0) {
        header.style.backgroundColor = 'rgb(219 219 219)';
      } else {
        header.style.backgroundColor = 'transparent';
      }
})
window.onscroll = function() {
   
    if (window.pageYOffset > 0) {
      header.style.backgroundColor = 'rgb(219 219 219)';
    } else {
      header.style.backgroundColor = 'transparent';
    }
  };