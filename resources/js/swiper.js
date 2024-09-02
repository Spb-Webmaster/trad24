// init Swiper:
import Swiper from "swiper";
import {Navigation, Pagination} from "swiper/modules";

 new Swiper(".mySwiper", {
    slidesPerView: "auto",
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

new Swiper('.mainswiper', {
    // configure Swiper to use modules
    modules: [Navigation, Pagination],
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// init swiper_researches:
new Swiper('.swiper_researches', {
    // configure Swiper to use modules
    modules: [Navigation, Pagination],
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next-swiper_researches",
        prevEl: ".swiper-button-prev-swiper_researches",
    },
    breakpoints: {
        // mobile + tablet - 320-990
        320: {
            slidesPerView: 1
        },
        568: {
            slidesPerView: 2
        },
        742: {
            slidesPerView: 3
        },
        // desktop >= 991
        991: {
            slidesPerView: 4
        }
    }
});

// init swiper_expertise:
new Swiper('.swiper_expertise', {
    // configure Swiper to use modules
    modules: [Navigation, Pagination],
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next-swiper_expertise",
        prevEl: ".swiper-button-prev-swiper_expertise",
    },
    breakpoints: {
        // mobile + tablet - 320-990
        320: {
            slidesPerView: 1
        },
        568: {
            slidesPerView: 2
        },
        742: {
            slidesPerView: 3
        },
        // desktop >= 991
        991: {
            slidesPerView: 4
        }
    }
});

// init swiper_shop_projects__item:
new Swiper('.swiper_shop_projects__item', {
    // configure Swiper to use modules
    modules: [Navigation, Pagination],
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next-swiper_shop_projects__item",
        prevEl: ".swiper-button-prev-swiper_shop_projects__item",
    },
    breakpoints: {
        // mobile + tablet - 320-990
        320: {
            slidesPerView: 1
        },
        568: {
            slidesPerView: 2
        },
        742: {
            slidesPerView: 3
        },
        // desktop >= 991
        991: {
            slidesPerView: 3
        }
    }
});
