export function sel_religion() {

    /*     блок (псевдо select) переключает и перезагружает религию    */

    $('body').on('click', '.s__js', function (event) {

        $(this).parents('.axeld_select__js').find('.s_box').toggleClass('active');
        $(this).toggleClass('reverse');
    });

    /** select религий  */
    $('body').on('click', '.s_rel__js', function (event) {

        let Parent = $(this).parents('.axeld_select__js');
        Parent.find('.s__js').find('span').text($(this).text());
        let Id = $(this).find('span').data('religion');
        Parent.find('.s__js').attr('data-religion', Id);
        Parent.find('.s_box').toggleClass('active');
        Parent.find('.s_box__rel').removeClass('active');
        $(this).addClass('active');

        $('form[name="religion"]').find('.f_religion__js').val(Id);
        document.forms['religion'].submit();

    });

    /** select категорий религий  */
    $('body').on('click', '.s_relob__js', function (event) {

        let Parent = $(this).parents('.axeld_select__js');
        Parent.find('.s__js').find('span').text($(this).text());
        let Id = $(this).find('span').data('religion_category');
        Parent.find('.s__js').attr('data-religion_category', Id);
        Parent.find('.s_box').toggleClass('active');
        Parent.find('.s_box__rel').removeClass('active');
        $(this).addClass('active');

        $('form[name="religion_category"]').find('.f_religion_category__js').val(Id);
        document.forms['religion_category'].submit();

    });


    /*
     // блок (псевдо select) переключает и перезагружает религию
    */
    /*
     блок (select chosen) переключает и перезагружает регионы
    */

    $('.select_area__js').change(function () {
        $('form[name="area"]').find('.f_area__js').val($(this).val());
        if ($(this).val() !== 0) {
            document.forms['area'].submit();
        }
    });

    /*
     //  блок (select chosen) переключает и перезагружает регионы
        */

    /*
     блок (открыть / закрыть ) chosen регионы
    */

    $('body').on('click', '.f_region__js', function (event) {
        $('.f_region').toggleClass('active');
        $('.chosen__js').toggleClass('active');
    });



}




export function chosen() {
    //todo:jquery


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



}
