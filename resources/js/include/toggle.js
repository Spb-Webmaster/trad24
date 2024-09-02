export function article_toggle() {

    $('body').on('click', '.edit__js', function (event) {
        $(this).parents('.edit__absolute').find('.editMenuEdit').slideToggle();
    });
}
