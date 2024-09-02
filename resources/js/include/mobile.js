export function mobile_menu () {
    /**
     * меню мобильное
     * */
    $('.mobile_version__logo').html($('.header_bottom .logo').html());
    $('.mobile_version__social').html($('.header_top .top_social').html());

    $('body').on('click', '.m_f3', function (event) {

        if ($(this).hasClass('active')) {

            $('.fLogin').hide();
            $('.fMenu').hide();

            $('.mob_menu_content').fadeOut();
            $(this).removeClass('active');


        } else {
            $('.fMenu').show();
            $('.fLogin').hide();

            $('.mob_menu_content').fadeIn();
            $('.m_f').removeClass('active');
            $(this).addClass('active');
        }
    });


    $('body').on('click', '.m_f5', function (event) {

        if ($(this).hasClass('active')) {

            $('.fLogin').hide();
            $('.fMenu').hide();

            $('.mob_menu_content').fadeOut();
            $(this).removeClass('active');


        } else {
            $('.fMenu').hide();
            $('.fLogin').show();

            $('.mob_menu_content').fadeIn();
            $('.m_f').removeClass('active');
            $(this).addClass('active');
        }
    });


}

export function mobile_menu_close () {

// закрытие меню
    $('body').on('click', '.m_m_top_close', function (event) {

        $('.mob_menu_content').fadeOut();
        $('.m_f').removeClass('active');

    });
}

export function add__mobile_menu() {

    // добавляем в мобильное меню пункты у который есть class="add__mobile_menu"
    $('.add__mobile_menu').each(function (index) {
        let active;
        if ($(this).hasClass('active')) {
            active = 'active';
        } else {
            active = '';
        }
        $('.fMenu').append('<li><a class="' + active + '" href="' + $(this).attr('href') + '">' + $(this).text() + '</a></li>');


    });
}
