@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Кабинет менеджера / Пользователи"
    description="Кабинет менеджера / Пользователи"
    keywords="Кабинет менеджера / Пользователи"
/>
@section('cabinet')
    <div class="auth">
        <div class="cabinet">
            <div class="block">

                <div class="hbox__top pad_b1">
                    <h1>{{__('Панель менеджера')}}</h1>
                </div>

                <div class="cabinet__flex  height_100">
                    <div class="cabinet__left">
                        <div class="cl">

                            @include('dashboard.left_bar.left')

                        </div>
                    </div>

                    <div class="cabinet__right">

                        @include('dashboard.menu.cabinet_menu')

                        <div class="cabinet_radius12_fff">

                            <div class="c__title_subtitle">
                                <h3 class="F_h1">{{ __('Пользователи сайта') }}</h3>
                                <div class="F_h2 pad_t5">
                                    <span>{{__('Все зарегистрированные пользователи сайта, включая не опубликованных.')}}</span>
                                </div>
                            </div>


                            @if(isset($items))
                                <div class="cabinet_ob_peoles">

                                    <div class="user25_m_first">
                                            <div class="user25__avatar_first">
                                                <div class="user25__avatar_img"
                                                     style="background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCAwQzguMDU5NSAwIDAgOC4wNTk1IDAgMThDMCAyNy45NDA1IDguMDU5NSAzNiAxOCAzNkMyNy45NDA1IDM2IDM2IDI3Ljk0MDUgMzYgMThDMzYgOC4wNTk1IDI3Ljk0MDUgMCAxOCAwWk0xOCA3LjUwMDA3QzIxLjcyMTUgNy41MDAwNyAyNC43NSAxMC41Mjg2IDI0Ljc1IDE0LjI1MDFDMjQuNzUgMTcuOTcxNiAyMS43MjE1IDIxLjAwMDEgMTggMjEuMDAwMUMxNC4yNzg1IDIxLjAwMDEgMTEuMjUgMTcuOTcxNiAxMS4yNSAxNC4yNTAxQzExLjI1IDEwLjUyODYgMTQuMjc4NSA3LjUwMDA3IDE4IDcuNTAwMDdaTTcuOTQ1NTEgMjkuMDk4NEMxMC42MDk1IDMxLjUxNDkgMTQuMTMgMzIuOTk5OSAxOCAzMi45OTk5QzIxLjg3IDMyLjk5OTkgMjUuMzkwNSAzMS41MTQ5IDI4LjA1NDUgMjkuMDk4NEMyNi43ODU1IDI2LjE2MTQgMjIuNzc2IDIzLjk5OTkgMTggMjMuOTk5OUMxMy4yMjQgMjMuOTk5OSA5LjIxNDUxIDI2LjE2MTQgNy45NDU1MSAyOS4wOTg0WiIgZmlsbD0iI0UwRTBFMCIvPgo8L3N2Zz4K  ');  width: 25px; height: 25px "></div>
                                            </div>
                                            <div class="user25_m__self_first">
                                                Пользователь, e-mail
                                            </div>
                                            <div class="user25_m_list_first">
                                                Публикации
                                            </div>

                                            <div class="user25_m_gallery_first">
                                                Изображения
                                            </div>
                                        </div>

                                    @foreach($items as $k => $item)

                                        <div class="user25_m  @if(!$item->published) background_alert @endif ">


                                            <div class="user25__avatar">
                                                @if(isset($item->avatar))
                                                    <a href="{{ route('m_user', ['user_id' => $item->id]) }}" class="user25__avatar_img"
                                                         style="background-image: url('{{  asset(intervention('48x48', $item->avatar, 'users/' . $item->id  . '/avatar')) }}'); width: 48px; height: 48px">
                                                    </a>
                                                @else
                                                    <a href="#" class="user25__avatar_img"
                                                         style="background-color:#fff; background-image: url('{!! 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCAwQzguMDU5NSAwIDAgOC4wNTk1IDAgMThDMCAyNy45NDA1IDguMDU5NSAzNiAxOCAzNkMyNy45NDA1IDM2IDM2IDI3Ljk0MDUgMzYgMThDMzYgOC4wNTk1IDI3Ljk0MDUgMCAxOCAwWk0xOCA3LjUwMDA3QzIxLjcyMTUgNy41MDAwNyAyNC43NSAxMC41Mjg2IDI0Ljc1IDE0LjI1MDFDMjQuNzUgMTcuOTcxNiAyMS43MjE1IDIxLjAwMDEgMTggMjEuMDAwMUMxNC4yNzg1IDIxLjAwMDEgMTEuMjUgMTcuOTcxNiAxMS4yNSAxNC4yNTAxQzExLjI1IDEwLjUyODYgMTQuMjc4NSA3LjUwMDA3IDE4IDcuNTAwMDdaTTcuOTQ1NTEgMjkuMDk4NEMxMC42MDk1IDMxLjUxNDkgMTQuMTMgMzIuOTk5OSAxOCAzMi45OTk5QzIxLjg3IDMyLjk5OTkgMjUuMzkwNSAzMS41MTQ5IDI4LjA1NDUgMjkuMDk4NEMyNi43ODU1IDI2LjE2MTQgMjIuNzc2IDIzLjk5OTkgMTggMjMuOTk5OUMxMy4yMjQgMjMuOTk5OSA5LjIxNDUxIDI2LjE2MTQgNy45NDU1MSAyOS4wOTg0WiIgZmlsbD0iI0UwRTBFMCIvPgo8L3N2Zz4K' !!}'); width: 48px; height: 48px"></a>
                                                @endif
                                            </div>

                                            <div class="user25_m__self">
                                                <a href="{{ route('m_user', ['user_id' => $item->id]) }}"
                                                    class="user25_m__name">{{ $item->name }}</a>
                                                <div
                                                    class="user25_m__email">{{ $item->email }}</div>

                                                <div class="user25_m__phone">{{ ($item->phone)?format_phone($item->phone):'—' }}</div>

                                            </div>

                                            <div class="user25_m_list">

                                                <a href="{{ route('m_user_photos' , ['user_id' => $item->id] ) }}" class="user25_m_list_item user25_m_photos"><x-dashboard.icons.photos/> <span>Изображений</span> — <i>{{ count($item->user_photo) }}</i></a>

                                                <a href="{{ route('m_user_videos' , ['user_id' => $item->id] ) }}" class="user25_m_list_item user25_m_videos"><x-dashboard.icons.videos/> <span>Видоефайлов</span> — <i>{{ count($item->user_video) }}</i></a>

                                                <a href="{{ route('m_user_articles' , ['user_id' => $item->id] ) }}" class="user25_m_list_item user25_m_articles"><x-dashboard.icons.articles/> <span>Статей</span> — <i>{{ count($item->user_article) }}</i></a>

                                            </div>

                                            <div class="user25_m_gallery">


                                                @foreach($item->user_photo_9 as $photo)

                                                    <div class="user25_m_gallery__item" style="background-image: url('{{ asset(intervention('42x42', $photo['img'], 'users/' . $user->id  . '/photos', 'cover')) }}')" ></div>

                                                @endforeach


                                            </div>


                                        </div>

                                    @endforeach

                                </div>
                                <div
                                    class="display_none__">{{ $items->withQueryString()->links('pagination::default') }}</div>
                            @endif

                        </div>

                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
@endsection


