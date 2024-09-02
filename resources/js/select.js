//todo:jquery
document.addEventListener('DOMContentLoaded', function () {


    $('.js-chosen').chosen({
        width: '100%',
        no_results_text: 'Совпадений не найдено',
        placeholder_text_single: 'Выберите регион'
    });

/*        $('.selectize').selectize({
            plugins: ["restore_on_backspace", "clear_button"],
            delimiter: " - ",
            persist: false,
            maxItems: null,
            sortField: 'text'

        });*/

});


