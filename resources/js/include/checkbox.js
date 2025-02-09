export function checkbox() {

    $('input[type="checkbox"].check_all').on('change', function () {

        if ($(this).attr('data-chance') == 1) {
            $('.checkbox_change').prop('checked', false);
            $(this).attr('data-chance', 0);
            $('.cart_icon__js').css('display', 'none');


        } else {
            $('.checkbox_change').prop('checked', true);
            $(this).attr('data-chance', 1);
            $('.cart_icon__js').css('display', 'flex');

        }


    });

    $('input[type="checkbox"].checkbox_change').on('change', function () {
        var ok = false;

        $('input[type="checkbox"].checkbox_change').each(function (i)  {
            if ($(this).is(':checked')) {
                ok = true;
            }
        });


        if(ok) {
            $('.cart_icon__js').css('display', 'flex');
        } else {
            $('.cart_icon__js').css('display', 'none');
        }


    });
}
