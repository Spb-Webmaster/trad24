<div class="hbox__submenu hbox__submenuBorder">
    <div class="view_subcategories_countries v_s_c_2 ">
        <div class="flex v_s_c__flex">
            <div class="v_s_c__item {{ active_linkMenu(route('cabinet.people_photos', ['user_id' => $item->id]) , 'find' )  }}"><a href="{{ route('cabinet.people_photos', ['user_id' => $item->id]) }}">Фото</a></div>
            <div class="v_s_c__item {{ active_linkMenu(route('cabinet.people_videos', ['user_id' => $item->id]) , 'find' )  }}"><a href="{{ route('cabinet.people_videos', ['user_id' => $item->id]) }}">Видео</a></div>
            <div class="v_s_c__item {{ active_linkMenu(route('cabinet.people_articles', ['user_id' => $item->id]) , 'find' )  }}"><a href="{{ route('cabinet.people_articles', ['user_id' => $item->id]) }}">Статьи</a></div>

        </div>
    </div>
</div>
