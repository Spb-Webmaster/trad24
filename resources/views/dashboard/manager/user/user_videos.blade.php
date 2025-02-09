@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Кабинет менеджера / Видео / Пользователь  {{$item->name}} "
    description="Кабинет менеджера /  Видео /Пользователь  {{$item->name}} "
    keywords="Кабинет менеджера /  Видео / Пользователь  {{$item->name}} "
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
                                <h3 class="F_h1">{{ __('Пользователь сайта') }}</h3>
                                <div class="F_h2 pad_t5">
                                    <span>{{ __('Пользователь') . ' - ' . $item->name }}</span>
                                </div>
                            </div>
                            <div class="dashboardBox dashboardBox__a_user ">

                                <x-dashboard.user.user_avatar_email_phone__mini :user="$item"
                                                                                backround="background_biruza"/>

                                @include('dashboard.manager.user._partial.menu')


                                <div class="cabinet_ob_peoles">
                                    В разработке
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
@endsection



