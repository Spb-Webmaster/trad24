{{--$profile == true - показать меню прифиля user-а--}}
<div class="cabinet_radius12_fff">

    @include('dashboard.left_bar.avatar')

    <div class="c__title_subtitle pad_t20_important">
        <h3 class="F_h1 left_bar__name" title="{{ $user->name }}">{{ $user->name }}</h3>
        <div class="F_h2 left_bar__email pad_t5"><span>{{ $user->email }}</span></div>
        @if($user->phone)
            <div class="left_bar__phone pad_t10"><span>{{ format_phone($user->phone) }}</span></div>
        @endif

    </div>
</div>
<br>
<br>

@if($user->manager)
    <div class="cabinet_radius12_fff pad_t10_important pad_b10_important">
        <div class="c__title_manager">
            <h4>Панель менеджера</h4>
        </div>

        <div class="user_profile__links pad_t2_important">

            <div class="user_profile__link  {{ active_linkMenu(route('m_users') , 'find' )  }}">
                <a href="{{route('m_users')}}">
                    <x-dashboard.icons.users_solid title="Список пользователей сайта"/>
                    <span>Пользователи</span></a>
            </div>
            <div class="user_profile__link">
                <a href="#">
                    <x-dashboard.icons.photos_solid title="Новые загруженные изображения пользователями сайта"/>
                    <span>Новые фото</span></a>
            </div>
            <div class="user_profile__link">
                <a href="#">
                    <x-dashboard.icons.videos title="Новые ссылки на видео от пользователей сайта" />
                    <span>Новые видео</span></a>
            </div>



        </div>
    </div>
    <br>
    <br>
@endif

@if(isset($profile))
    <div class="cabinet_radius12_fff pad_t10_important pad_b10_important">

        <div class="user_profile__links">

            <div class="user_profile__link a_profile_solid">
                <a href="{{ route('cabinet.profile_photos') }}">
                    <x-dashboard.icons.profile_solid/>
                    <span>Профиль</span></a>
            </div>

            <div class="user_profile__link a_users_solid  {{ active_linkMenu(route('cabinet.peoples') , 'find' )  }}">
                <a href="{{ route('cabinet.peoples') }}">
                    <x-dashboard.icons.users_solid/>
                    <span>Люди</span></a>
            </div>

            <div class="user_profile__link a_photos_solid  {{ active_linkMenu(route('cabinet.photos', ['user_id' => auth()->user()->id ]) , 'find' )  }}">
                <a href="{{ route('cabinet.photos', ['user_id' => auth()->user()->id ]) }}">
                    <x-dashboard.icons.photos_solid/>
                    <span>Фото</span></a>
            </div>

            <div class="user_profile__link a_users_solid {{ active_linkMenu(route('cabinet.videos', ['user_id' => auth()->user()->id ]) , 'find' )  }}">
                <a href="{{ route('cabinet.videos', ['user_id' => auth()->user()->id ]) }}">
                    <x-dashboard.icons.videos/>
                    <span>Видео</span></a>
            </div>

            <div class="user_profile__link a_articles_solid {{ active_linkMenu(route('cabinet.articles', ['user_id' => auth()->user()->id ]) , 'find' )  }}">
                <a href="{{route('cabinet.articles', ['user_id' => auth()->user()->id ])}}">
                    <x-dashboard.icons.articles_solid/>
                    <span>Статьи</span></a>
            </div>

            <div class="user_profile__link a_puzzle_solid">
                <a href="{{ route('cabinet') }}">
                    <x-dashboard.icons.puzzle_solid/>
                    <span>Настройки</span></a>
            </div>

        </div>
    </div>
    <br>
    <br>
@endif

<div class="cabinet_radius12_fff pad_t10_important pad_b10_important">
    <div class="pd_b_new enter_to_website__a">
        <x-forms.auth-form_mob
            title=""
            subtitle=""
            action="{{ route('logout') }}"
            method="POST"
        >
            <button type="submit" class="enter_to_website__a2"><span class="sp__kab">{{__('Выход')}}</span></button>
        </x-forms.auth-form_mob>
    </div>
</div>


