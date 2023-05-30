
  var menu = ['', '', '']
  var swiper = new Swiper(".hero-slider", {
    loop:true,
    speed:1000,
    autoplay: 
    {
      delay: 5000,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (menu[index]) + "</span>";
      },
    },
  });



  var swiper = new Swiper(".projectSwiper", {
    slidesPerView: "auto",
    loop:true,
    speed:1000,
    autoplay: 
    {
      delay: 2000,
    },
    // spaceBetween:10,
    // pagination: {
    //   el: ".swiper-pagination",
    //   clickable: true,
    // },
    breakpoints: { 
      350: {
        
        spaceBetween: 20,
   
      },
      640: {
        
        spaceBetween: 30,
   
      },
      768: {
        spaceBetween: 30,
        
       
      },
      1024: {
        
        spaceBetween: 40,
      },
    }
  });

  var swiper = new Swiper(".clientSwiper", {
    loop: true,
  freeMode: true,
  spaceBetween: 10,
  grabCursor: true,
  // slidesPerView: 5,
  loop: true,
  autoplay: {
    delay: 1,
    disableOnInteraction: true
  },
  freeMode: true,
  speed: 5000,
  freeModeMomentum: false,
  breakpoints: {
    340: {
      slidesPerView: 2,
 
    },
    640: {
      slidesPerView: 4,
 
    },
    768: {
      slidesPerView: 4,
     
    },
    1024: {
      slidesPerView: 5,
      
    },
  }
  });

  var swiper = new Swiper(".teamSwiper", {
    slidesPerView: "auto",
    spaceBetween: 30,
    speed:1000,
    autoplay: 
    {
      delay: 2000,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });