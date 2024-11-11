import moment from 'moment';
import 'moment/dist/locale/ru';
moment.locale('ru');


export function localDataPicker() {
    /* Локализация datepicker */
    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: 'Предыдущий',
        nextText: 'Следующий',
        currentText: 'Сегодня',
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
        dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);
}

export function datepicker_birthdate() {
    $(".datepicker-birthdate").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: "-16Y",
            minDate: "-80Y",
            yearRange: "-80:-16",
            onSelect: function () {
                var dateObject = $(this).datepicker('getDate');
                $('#alternate').text(moment(dateObject).format('LL'));

            }

        });

}
export function datepicker_event() {
    //var calendarEvents = [[10, 22, 2024], [10, 24, 2024]];
    var calendarEvents = $('.calendarEvents__js').data('events');

    //var calendarHref = ["https://stackoverflow.com", "https://google.com"];
    var calendarHref = $('.calendarHref__js').data('link');
    //var calendarHover = ["stackoverflow", "google.com"];
    var calendarHtml = $('.calendarHtml__js').data('html');

    $("#datepicker1").datepicker({
        changeMonth: true,
        changeYear: true,
        numberOfMonths: [1, 1],
        showCurrentAtPos: 0,
        beforeShowDay: function (date) {
            var i;
            for (i = 0; i < calendarEvents.length; i++) {
                if (date.getMonth() == calendarEvents[i][0] - 1 && date.getDate() == calendarEvents[i][1] && date.getFullYear() == calendarEvents[i][2]) {

                    return [true, "ui-state-active", calendarEvents[i][3]];
                }
            }
            return [true, ""];
        },
        onSelect: function (dateText, inst) {
            var i;
            for (i = 0; i < calendarEvents.length; i++) {
                if (inst.selectedMonth == calendarEvents[i][0] - 1 && inst.selectedDay == ("" + calendarEvents[i][1]) && inst.selectedYear == calendarEvents[i][2]) {


                    $('.datepicker_display').html('<a href="' + calendarHref[i] + '">' + calendarHtml[i] + '</a>');
                    $('.datepicker_display').show();

                }

            }
        }
    });

}

