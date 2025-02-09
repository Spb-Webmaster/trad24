@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Кабинет менеджера / Пользователь  {{$item->name}} "
    description="Кабинет менеджера / Пользователь  {{$item->name}} "
    keywords="Кабинет менеджера / Пользователь  {{$item->name}} "
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

                                <x-dashboard.user.user_avatar_email_phone :user="$item"/>


                                @include('dashboard.manager.user._partial.menu')

                                <br>
                                <div class="cabinet_radius12_fff">

                                    <div class="user_blocked__flex">
                                        <div class="user_blocked__left">
                                            <x-dashboard.user.checkbox.checkbox2 check="{{$item->published}}" user_id="{{$item->id}}" class="published_user__js"/>
                                        </div>

                                        <div class="user_blocked__right">
                                            @if($item->published)
                                                <span class="green_mess">Опубликован</span>
                                            @else
                                                <span class="red_mess">Заблокирован</span>
                                            @endif
                                        </div>

                                    </div><!--.user_blocked__flex-->


                                </div>

                                <br>
                                <br>
                                <div class=" cabinet_radius12_fff green_mess
                                        ">


                                    <div class="">
                                        <p>Планируется выводить статистику пользователя по активности. Пока только в
                                            идеях. <br>Не реализовано.</p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
@endsection



