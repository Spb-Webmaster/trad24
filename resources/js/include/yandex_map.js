export function yandex_map_object(key){
    setTimeout(function () {

        if($('#JFormFieldMap').length) {
            var elem = document.createElement('script');
            elem.type = 'text/javascript';
            elem.src = '//api-maps.yandex.ru/2.1/?apikey='+ key +'&package.standard&lang=ru_RU&onload=getYaMap';
            document.getElementsByTagName('body')[0].appendChild(elem);

            if($('#loader_wrapper').length) {
                document.getElementById('loader_wrapper').style.visibility = 'hidden';
            }
            if($('.wrapper_loader').length) {
                document.querySelector(".wrapper_loader").style.display = 'none';
            }
        }

    }, 2000);

}
