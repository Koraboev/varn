// =================== preloader js  ================== //
window.addEventListener("load", function () {
  var preloader = document.querySelector(".preloader");
  preloader.style.transition = "opacity .5s ease";
  preloader.style.opacity = "0";
  setTimeout(function () {
    preloader.style.display = "none";
  }, 1500);
});
let summaryCollection = document.getElementsByTagName('summary');
let signsCollection = document.getElementsByClassName('faq-open-icon');

for(let i = 0; i < summaryCollection.length; i++) {
    summaryCollection[i].onclick = function() {
        if(signsCollection[i].innerHTML === '+') signsCollection[i].innerHTML = '—';
        else signsCollection[i].innerHTML = '+';
    }
}
//It's a bit of programming pun, you see
$(document).ready(function() {
    $('.magnific-popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: true
        }
    });
});

// =================== preloader js end ================== //

// =================== light and dark start ================== //

const moon = document.getElementById("btnSwitch");
const icon = document.querySelector("#btnSwitch img");
moon.addEventListener("click", () => {
  const theme = document.documentElement.getAttribute("data-bs-theme");
  document.documentElement.setAttribute(
    "data-bs-theme",
    theme === "dark" ? "light" : "dark"
  );
  if (theme === "light") {
    icon.src = "assets/images/icon/sun.svg";
    moon.style.backgroundColor = "white";
  } else {
    icon.src = "assets/images/icon/moon.svg";
    moon.style.backgroundColor = "black";
  }

  changeImage();
});
// =================== light and dark end ================== //

// =================== Change image path start ================== //
function changeImage() {
  var theme = document.querySelector("html").getAttribute("data-bs-theme");
  if (theme == "dark") {
    var images = document.querySelectorAll("img.dark");

    for (var i = 0; i < images.length; i++) {
      var oldSrc = images[i].src;
      var oldIndex = oldSrc.lastIndexOf(".");
      var baseName = oldSrc.slice(0, oldIndex);
      var extension = oldSrc.slice(oldIndex);
      var newSrc = baseName + "-dark" + extension;
      images[i].src = newSrc;
    }
  } else {
    var images = document.querySelectorAll("img.dark");

    for (var i = 0; i < images.length; i++) {
      var oldSrc = images[i].src;
      var newSrc = oldSrc.replace("-dark.", ".");
      images[i].src = newSrc;
    }
  }
}

changeImage();

// =================== Change image path end ================== //

// =================== header js start here ===================
// Add class 'menu-item-has-children' to parent li elements of '.submenu'
var submenuList = document.querySelectorAll("ul>li>.submenu");
submenuList.forEach(function (submenu) {
  var parentLi = submenu.parentElement;
  if (parentLi) {
    parentLi.classList.add("menu-item-has-children");
  }
});

// Fix dropdown menu overflow problem
var menuList = document.querySelectorAll("ul");
menuList.forEach(function (menu) {
  var parentLi = menu.parentElement;
  if (parentLi) {
    parentLi.addEventListener("mouseover", function () {
      var menuPos = menu.getBoundingClientRect();
      if (menuPos.left + menu.offsetWidth > window.innerWidth) {
        menu.style.left = -menu.offsetWidth + "px";
      }
    });
  }
});

// Toggle menu on click
var menuLinks = document.querySelectorAll(".menu li a");

menuLinks.forEach(function (link) {
  link.addEventListener("click", function (e) {
    e.stopPropagation(); // prevent the event from bubbling up to parent elements
    var element = link.parentElement;
    if (parseInt(window.innerWidth, 10) < 1200)
      if (element.classList.contains("open")) {
        element.classList.remove("open");
        element.querySelector("ul").style.display = "none";
      } else {
        element.classList.add("open");
        element.querySelector("ul").style.display = "block";
      }
  });
});

// Toggle header bar on click
var headerBar = document.querySelector(".header-bar");
headerBar.addEventListener("click", function () {
  headerBar.classList.toggle("active");
  var menu = document.querySelector(".menu");
  if (menu) menu.classList.toggle("active");
});

//Header
var fixedTop = document.querySelector("header");
window.addEventListener("scroll", function () {
  if (window.scrollY > 300) fixedTop.classList.add("header-fixed", "fadeInUp");
  else fixedTop.classList.remove("header-fixed", "fadeInUp");
});
// =================== header js end here =================== //
//Animation on Scroll initializing

AOS.init();
// =================== custom trk slider js here =================== //
// specialist  slider here
const specialist = new Swiper(".specialist-slider", {
    speed: 500,
    slidesPerView: 1,
    spaceBetween: 0,
    freeMode: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        992: {
            slidesPerView: 3,
        },
        1200: {
            slidesPerView: 4,
        },
    },
    navigation: {
        nextEl: ".next-btn",
        prevEl: ".prev-btn",
    },
});
specialist.mount();

// blog  slider here
const blog = new Swiper(".blog__slider", {
  spaceBetween: 24,
  grabCursor: true,
  loop: true,
  slidesPerView: 3,
  breakpoints: {
  0: {
      slidesPerView: 1
  },
    576: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 25,
    },
  },

  autoplay: true,
  speed: 600,
  navigation: {
    nextEl: ".blog__slider-next",
    prevEl: ".blog__slider-prev",
  },
});

// =================== scroll js start here =================== //
// Show/hide button on scroll
window.addEventListener("scroll", function () {
  var scrollToTop = document.querySelector(".scrollToTop");

  if (scrollToTop) {
    if (window.pageYOffset > 300) {
      scrollToTop.style.bottom = "7%";
      scrollToTop.style.opacity = "1";
      scrollToTop.style.transition = "all .5s ease";
    } else {
      scrollToTop.style.bottom = "-30%";
      scrollToTop.style.opacity = "0";
      scrollToTop.style.transition = "all .5s ease";
    }
  }
});
// =================== scroll js end here =================== //

// =================== count start here =================== //
new PureCounter();
// =================== count end here =================== //


//
// const s = 3000;
// const slider = document.querySelector(".slider");
// const slides = document.querySelectorAll(".slide");
// const prevBtn = document.querySelector(".prev-btn");
// const nextBtn = document.querySelector(".next-btn");
// let currentIndex = 0;
// const slideWidth = slides[0].clientWidth;
// const totalSlides = slides.length;
// const slidesToShow = 4; // Number of slides to show at once
// const totalScrollSlides = totalSlides - slidesToShow;
//
// // Set up the initial position of the slider
// function setSliderPosition() {
//   slider.style.transform = `translateX(${-currentIndex * slideWidth}px)`;
// }
//
// setSliderPosition();
//
// // Next Button
// nextBtn.addEventListener("click", () => {
//   if (currentIndex < totalScrollSlides) currentIndex++;
//   else currentIndex = 0;
//   setSliderPosition();
// });
//
// // Previous Button
// prevBtn.addEventListener("click", () => {
//   if (currentIndex > 0) currentIndex--;
//   else currentIndex = totalScrollSlides;
//   setSliderPosition();
// });
//
// // Autoplay every 3 seconds
// let autoPlay = setInterval(() => {
//   nextBtn.click();
// }, s);
//
// // Pause autoplay on mouseover, resume on mouseout
// slider.addEventListener("mouseover", () => clearInterval(autoPlay));
// slider.addEventListener(
//   "mouseout",
//   () => (autoPlay = setInterval(() => nextBtn.click(), s))
// );
//
// let isDown = false;
// let startX;
// let scrollLeft;
//
// slider.addEventListener('mousedown', (e) => {
//     isDown = true;
//     slider.classList.add('active');
//     startX = e.pageX - slider.offsetLeft;
//     scrollLeft = slider.scrollLeft;
// });
//
// slider.addEventListener('mouseleave', () => {
//     isDown = false;
//     slider.classList.remove('active');
// });
//
// slider.addEventListener('mouseup', () => {
//     isDown = false;
//     slider.classList.remove('active');
// });
//
// slider.addEventListener('mousemove', (e) => {
//     if (!isDown) return;
//     e.preventDefault();
//     const x = e.pageX - slider.offsetLeft;
//     const walk = (x - startX) * 3; // Scroll tezligini sozlang
//     slider.scrollLeft = scrollLeft - walk;
// });
