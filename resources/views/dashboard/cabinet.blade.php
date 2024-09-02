@extends('layouts.layout_cabinet')
@section('title', ($seo_title) ?? __('Кабинет пользователя') )
@section('description', ($seo_description)?? __('Кабинет пользователя') )
@section('keywords', ($seo_keywords)?? __('Кабинет пользователя') )
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
                                <h3 class="F_h1">{{ __('Редактировать профиль') }}</h3>
                                <div class="F_h2 pad_t5"><span>{{__('Профиль редактируется самостоятельно.')}}</span></div>
                            </div>
                            @include('dashboard.forms.edit_profile')
                            <hr>
                            <div class="c__title_subtitle">
                                <h3 class="F_h1">{{ __('Изменить пароль') }}</h3>
                                <div class="F_h2 pad_t5"><span>{{__('Пароль минимум из пяти символов.')}}</span></div>
                            </div>
                            @include('dashboard.forms.edit_password')



                        </div>


                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
@endsection

