@extends('layouts.layout_cabinet')
@section('title', ($seo_title) ?? __('Кабинет пользователя / Пользователи') )
@section('description', ($seo_description)?? __('Кабинет пользователя / Пользователи') )
@section('keywords', ($seo_keywords)?? __('Кабинет пользователя / Пользователи') )
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





                            @if(isset($items))
                                <div class="cabinet_ob_peoles pad_t20  pad_b20 desc">
                                        @foreach($items as $k => $item)

                                        <p>{{ $item->name }}</p>

                                        @endforeach






                                </div>
                                <div class="display_none__">{{ $items->withQueryString()->links('pagination::default') }}</div>
                            @endif

                        </div>

                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
@endsection

