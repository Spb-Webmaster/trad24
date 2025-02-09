@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Кабинет пользователя"
    description="Кабинет пользователя"
    keywords="Кабинет пользователя"
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

                            <div class="cabinet_radius12_fff">

                                @include('dashboard.left_bar.avatar_non_reload')

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

                        </div>
                    </div>
                    <div class="cabinet__right">

                        <div class="cabinet_radius12_fff">

                            <div class="c__title_subtitle">
                                <h3 class="F_h1">{{ __('Аккаунт заблокирован') }}</h3>
                                <div class="F_h2 pad_t5"><span>{{__('Профиль заблокирован, обратитесь в поддержку ресурса.')}}</span></div>
                            </div>



                        </div>


                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
@endsection


