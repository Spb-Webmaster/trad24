<div class="hbox__submenu top">
    <div class="view_subcategories_countries v_s_c ">
        <div class="flex v_s_c__flex">

            <div class="v_s_c__item  {{ active_linkMenu(route('cabinet.profile') , 'find' )  }}">
                <a href="{{ route('cabinet.profile') }}">{{ __('Профиль') }}</a></div>

            <div class="v_s_c__item  {{ active_linkMenu(route('cabinet.peoples') , 'find' )  }}">
                <a href="{{ route('cabinet.peoples') }}">{{ __('Люди') }}</a></div>

            <div class="v_s_c__item  {{ active_linkMenu(route('cabinet.photos', ['user_id' => auth()->user()->id ]) , 'find' )  }}">
                <a href="{{ route('cabinet.photos', ['user_id' => auth()->user()->id ]) }}">{{ __('Фото') }}</a></div>


            <div class="v_s_c__item  {{ active_linkMenu(route('cabinet.videos', ['user_id' => auth()->user()->id ]) , 'find' )  }}">
                <a href="{{ route('cabinet.videos', ['user_id' => auth()->user()->id ]) }}">{{ __('Видео') }}</a></div>


            <div class="v_s_c__item  {{ active_linkMenu(route('cabinet.articles', ['user_id' => auth()->user()->id ]), 'find')  }}">

                <a href="{{route('cabinet.articles', ['user_id' => auth()->user()->id ])}}">{{ __('Статьи') }}</a>
            </div>

            <div class="v_s_c__item {{ active_linkMenu(route('cabinet'))  }}"><a href="{{ route('cabinet') }}">{{ __('Настройки') }}</a></div>

        </div>
        <div class="view_subcategories_countries__mobile menu_cab_m__js"></div>

    </div>
</div>

