export function autocomplete() {

    /*  .autocomplete-ajax */


    $('.big_search .autocomplete-ajax').autocomplete({
        source: function (request, response) {


            if($('#chosen_area').length) {
                var area = $('#chosen_area').find('select').val();
                $('.ui_area').val(area);
            }

            if($('._rel__js').length) {
                var religion = $('.s__js').data('religion');
                $('.ui_religion').val(religion);
            }


            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/search/big_autocomplete',
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "area": area,
                    "religion": religion,
                    term: request.term,
                },
                success: function (data) {

                    //  console.log(data)

                    response($.map(data, function (item) {
                        return {
                            id: item.id,
                            label: item.title,
                        }
                    }));
                }
            });
        },
        select: function (event, ui) {
            $('.ui_object').val(ui.item.id);


        },
        minLength: 2,
    });



    $('._search .autocomplete-ajax').autocomplete({
        source: function (request, response) {


            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/search/top_autocomplete',
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),

                    term: request.term,
                },
                success: function (data) {

                    //  console.log(data)

                    response($.map(data, function (item) {
                        return {
                            id: item.id,
                            label: item.title,
                        }
                    }));
                }
            });
        },
        select: function (event, ui) {
            $('.ui_object').val(ui.item.id);


        },
        minLength: 2,
    });




    /*//  .autocomplete-ajax */
}
