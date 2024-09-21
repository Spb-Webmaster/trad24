export function slick() {

    $('.slick_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        // centerMode: true,
        swipeToSlide: true,
        variableWidth: true,
        infinite: true,
        speed: 700,
        autoplay: true,
        autoplaySpeed: 7000,
    });

    $('.slick_slider__carusel').slick({
        slidesToShow: 3,
        slidesToScroll: 2,
        // centerMode: true,
        swipeToSlide: true,
        variableWidth: true,
        infinite: true,
        speed: 700,
        autoplay: true,
        autoplaySpeed: 7000,
    });

/*

    $('header ul.top_menu').slick({
        //   slidesToShow: 3,
        slidesToScroll: 1,
        // centerMode: true,
        swipeToSlide: true,
        variableWidth: true,
        infinite: false,

    });
*/

}
