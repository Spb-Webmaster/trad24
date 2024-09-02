export function close_flash() {
    /* -- закрытие flash  -- */
    $('body').on('click', '.flashClose__js', function (event) {
        $(this).parents('.flashMassege').slideUp(100);
    });

}
