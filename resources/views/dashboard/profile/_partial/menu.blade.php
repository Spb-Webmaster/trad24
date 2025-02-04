<div class="hbox__submenu hbox__submenuBorder">
    <div class="view_subcategories_countries v_s_c_2 ">
        <div class="flex v_s_c__flex">
            <div class="v_s_c__item {{ active_linkMenu(route('cabinet.profile_photos'), 'find' )  }}">
                <a href="{{ route('cabinet.profile_photos')}}">Фото</a></div>
            <div class="v_s_c__item {{ active_linkMenu(route('cabinet.profile_videos'), 'find' ) }}">
                <a href="{{ route('cabinet.profile_videos') }}">Видео</a></div>
            <div class="v_s_c__item {{ active_linkMenu(route('cabinet.profile_articles') , 'find' )  }}">
                <a href="{{ route('cabinet.profile_articles') }}">Статьи</a></div>

        </div>
    </div>
</div>
