<div class="hbox__submenu hbox__submenuBorder">
    <div class="view_subcategories_countries v_s_c_2 ">
        <div class="flex v_s_c__flex">

            <div class="v_s_c__item {{ active_linkMenu(route('m_user', ['user_id' => $item->id]) )  }}"><a href="{{ route('m_user' , ['user_id' => $item->id] ) }}">Профиль</a></div>

            <div class="v_s_c__item {{ active_linkMenu(route('m_user_photos', ['user_id' => $item->id]) , 'find' )  }}"><a href="{{ route('m_user_photos' , ['user_id' => $item->id] ) }}">Фото</a></div>


            <div class="v_s_c__item {{ active_linkMenu(route('m_user_videos', ['user_id' => $item->id]) , 'find' )  }}"><a href="{{ route('m_user_videos' , ['user_id' => $item->id] ) }}">Видео</a></div>

            <div class="v_s_c__item {{ active_linkMenu(route('m_user_articles', ['user_id' => $item->id]) , 'find' )  }}"><a href="{{ route('m_user_articles' , ['user_id' => $item->id] ) }}">Статьи</a></div>



        </div>
    </div>
</div>
