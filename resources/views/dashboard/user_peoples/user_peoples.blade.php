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


              

                        </div>

                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
@endsection

