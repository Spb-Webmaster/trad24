@extends('layouts.layout_cabinet')
<x-seo.meta
    title="{{ $user->name }}: профиль пользователя"
    description="{{ $user->name }}: профиль пользователя"
    keywords="{{ $user->name }}: профиль пользователя"
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
                                <h3 class="F_h1">{{ __('Профиль') }}</h3>
                                <div class="F_h2 pad_t5"><span>{{__('Профиль можно отредактировать самостоятельно.')}}</span></div>
                            </div>
                            <x-dashboard.user.user_avatar_email_phone :user="$user" />

                            @include('dashboard.profile._partial.menu')

                            @if(isset($items))
                                <div class="cabinet_ob_gallery grid pad_t20  pad_b20 ">
                                    @foreach($items as $k => $it)
                                        <div class="mItem" style="background-image: url('{{ asset(intervention('252x0', $it['img'], 'users/' . $user->id  . '/photos', 'scaleDown')) }}')"  >

                                            <a class="co" href="{{ asset(Storage::disk('public')->url($it['img'])) }}"
                                               data-fancybox="gallery"
                                               data-caption=""

                                            >
                                                <img  class="pc_category_img"
                                                      style="width: auto; height: auto"
                                                      loading="lazy"
                                                      src="{{ asset(intervention('252x0', $it['img'], 'users/' . $user->id  . '/photos', 'scaleDown')) }}"
                                                      alt="photo_{{ $k }}" title="">


                                            </a></div>

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

