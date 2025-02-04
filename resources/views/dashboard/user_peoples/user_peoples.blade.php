@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Кабинет пользователя / Пользователи"
    description="Кабинет пользователя / Пользователи"
    keywords="Кабинет пользователя / Пользователи"
/>
@section('cabinet')
    <div class="auth">
        <div class="cabinet">
            <div class="block">

                <div class="hbox__top pad_b1">
                    <h1>{{__('Личный кабинет')}}</h1>
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
                                    <span>{{__('Все зарегистрированные пользователи сайта.')}}</span>
                                </div>
                            </div>


                            @if(isset($items__))
                                <div class="cabinet_ob_peoles pad_t20  pad_b20 desc">

                                    @foreach($items as $k => $item)

                                        <a class="user25"
                                           href="{{ route('cabinet.people_photos', ['user_id' => $item->id]) }}">


                                            <div class="user25__avatar">
                                                @if(isset($item->avatar))
                                                    <div class="user25__avatar_img"
                                                         style="background-image: url('{{  asset(intervention('70x70', $item->avatar, 'users/' . $item->id  . '/avatar')) }}'); width: 30px; height: 30px">
                                                    </div>
                                                @else
                                                    <div class="user25__avatar_img"
                                                         style="background-color:#fff; background-image: url('{!! 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCAwQzguMDU5NSAwIDAgOC4wNTk1IDAgMThDMCAyNy45NDA1IDguMDU5NSAzNiAxOCAzNkMyNy45NDA1IDM2IDM2IDI3Ljk0MDUgMzYgMThDMzYgOC4wNTk1IDI3Ljk0MDUgMCAxOCAwWk0xOCA3LjUwMDA3QzIxLjcyMTUgNy41MDAwNyAyNC43NSAxMC41Mjg2IDI0Ljc1IDE0LjI1MDFDMjQuNzUgMTcuOTcxNiAyMS43MjE1IDIxLjAwMDEgMTggMjEuMDAwMUMxNC4yNzg1IDIxLjAwMDEgMTEuMjUgMTcuOTcxNiAxMS4yNSAxNC4yNTAxQzExLjI1IDEwLjUyODYgMTQuMjc4NSA3LjUwMDA3IDE4IDcuNTAwMDdaTTcuOTQ1NTEgMjkuMDk4NEMxMC42MDk1IDMxLjUxNDkgMTQuMTMgMzIuOTk5OSAxOCAzMi45OTk5QzIxLjg3IDMyLjk5OTkgMjUuMzkwNSAzMS41MTQ5IDI4LjA1NDUgMjkuMDk4NEMyNi43ODU1IDI2LjE2MTQgMjIuNzc2IDIzLjk5OTkgMTggMjMuOTk5OUMxMy4yMjQgMjMuOTk5OSA5LjIxNDUxIDI2LjE2MTQgNy45NDU1MSAyOS4wOTg0WiIgZmlsbD0iI0UwRTBFMCIvPgo8L3N2Zz4K' !!}'); width: 30px; height: 30px"></div>
                                                @endif
                                            </div>

                                            <div class="user25__name_birthday">
                                                <div
                                                    class="user25__name">{{ $item->name }}</div>
                                                <div
                                                    class="user25__birthday color_grey color_grey_13">{{ (isset($item->birthdate))?rusdate3($item->birthdate):'—' }}</div>

                                            </div>

                                            <div class="user25__email_phone">
                                                <div
                                                    class="user25__email">{{ $item->email }}</div>
                                                <div
                                                    class="user25__phone">{{ ($item->phone)?format_phone($item->phone):'—' }}</div>

                                            </div>

                                            <div class="user25__icons">
                                                @if(count($item->user_photo))
                                                    <div class="user25__one" title="{{ count($item->user_photo) }}">
                                                        <x-dashboard.icons.photos/>
                                                    </div>
                                                @endif

                                                @if(count($item->user_video))
                                                    <div class="user25__one" title="{{ count($item->user_video) }}">
                                                        <x-dashboard.icons.videos/>
                                                    </div>
                                                @endif
                                                @if(count($item->user_article))
                                                    <div class="user25__one" title="{{ count($item->user_article) }}">
                                                        <x-dashboard.icons.articles/>
                                                    </div>
                                                @endif


                                            </div>


                                        </a>

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

