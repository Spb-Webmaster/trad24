export function canvas_menu() {
    /* Slidemenu левое меню canvas*/
    (function () {
        var $body = document.body
            , $menu_trigger = $body.getElementsByClassName('menu-trigger')[0];

        if (typeof $menu_trigger !== 'undefined') {
            $menu_trigger.addEventListener('click', function () {
                $body.className = ($body.className == 'menu-active') ? '' : 'menu-active';
            });
        }

    }).call(this);

    $('body').on('click', '#nav_close__', function (event) {

        if($(this).parents('body').hasClass('menu-active')) {
            $(this).parents('body').removeClass('menu-active');
        }
    });

}
