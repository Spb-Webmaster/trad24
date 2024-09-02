<div class="ob_menu_hor">
    <div class="ob_gamburger">
        <div class="gamburger menu-trigger">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div class="ob_gamburger__menu"><span>{{ __('Menu') }}</span></div>
    </div>


    <div class="ob_menu_hor__ul">

        <ul class="top_menu">
            <li class="{{ active_linkMenu(asset(route('page.object.about', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="{{ active_linkMenu(asset(route('page.object.about', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu" href="{{ route('page.object', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Главная</span></a></li>



            <li class="{{ active_linkMenu(asset(route('page.object.new_category', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ), 'find') }}"><a class="{{ active_linkMenu(asset(route('page.object.new_category', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ), 'find') }} add__mobile_menu"  href="{{ route('page.object.new_category', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Новости</span></a></li>

            <li class="{{ active_linkMenu(asset(route('page.object.gallery', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="{{ active_linkMenu(asset(route('page.object.gallery', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu"  href="{{ route('page.object.gallery', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Фотогалерея</span></a></li>

            <li class="{{ active_linkMenu(asset(route('page.object.faq', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="{{ active_linkMenu(asset(route('page.object.faq', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu"  href="{{ route('page.object.faq', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Вопрос-ответ</span></a></li>

            <li class="{{ active_linkMenu(asset(route('page.object.video', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="{{ active_linkMenu(asset(route('page.object.video', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu"  href="{{ route('page.object.video', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Видеоматериалы</span></a></li>


            <li class="{{ active_linkMenu(asset(route('page.object.info', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="{{ active_linkMenu(asset(route('page.object.info', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu"  href="#"><span>Полезная информация</span></a>
<ul class="submenu">
    <li><a href="#">Полезная информация</a></li>
    <li><a href="#">Полезная информация</a></li>
    <li><a href="#">Полезная информация</a></li>
    <li><a href="#">Полезная информация</a></li>


</ul>



            </li>




            <li class="{{ active_linkMenu(asset(route('page.object.contact', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}"><a class="{{ active_linkMenu(asset(route('page.object.contact', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu"  href="{{ route('page.object.contact', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Контакты</span></a></li>

        </ul>
    </div>

</div>
<div class="ob_menu_hor__js ob_menu_hor__css"></div>

