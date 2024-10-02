export function menu_js() {
    $('.ob_menu_hor__ul a').each(function (index, h) {

        //    console.log($(this).parent('li').find('.submenu').html());

        let Href, Text, Class;
        if ($(this).hasClass('add__mobile_menu')) {
            Href = $(h).attr('href');
            Text = $(h).text();
            Class = $(h).attr('class');



            $('.ob_menu_hor__js').append('<a  data-id="'+index+'" class="' + Class + '" href="' + Href + '">' + Text + '</a>');


        }

    })


    $('body').on('click', '.ob_gamburger', function (event) {
        $('.ob_menu_hor__js').slideToggle();
    });

    /*
     Перемещение Дополнительного меню объектов в левое основное меню сайта
     */

    if ($('.m_l__js').length) {
        $('.replace_menu__js').html($('.m_l__js').html());
    }

    /*
     Перемещение Дополнительного меню объектов в левое основное меню сайта
    */
//
}
