@extends('layouts.layout_cabinet')
<x-seo.meta
    title="{{ ($it->title)??'' }} | {{ config('site.constants.site_name') }} - {{ ($item->name)??'' }}"
    description="{{ ($it->title)??'' }} |  {{ config('site.constants.site_name') }} - {{ ($item->name)??'' }}"
    keywords="{{ config('site.constants.site_name') }} - {{ ($item->name)??'' }}"
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
                                <h3 class="F_h1">{{ __('Страница пользователя') }}</h3>
                                <div class="F_h2 pad_t5">
                                    <span>{{__('Вы можете просматиривать личные данные.')}}</span>
                                </div>
                            </div>
                            <div class="dashboardBox dashboardBox__a_user ">

                                <x-dashboard.user.user_avatar_email_phone :user="$item" />

                                @include('dashboard.user_peoples.people._partial.menu')



                                    <div class="_articles__foreach">
                                            <div class="_articles__item">

                                                <h2 class="_articles_h2_title">{{ $it->title }}</h2>
                                                <div class="_video_emb">
                                                    {!!  render_video($it->video, 658, 345)  !!}
                                                </div>
                                                <div class="_articles_text desc">{!!   $it->article !!}</div>

                                            </div>
                                        <x-dashboard.user.options.options_article :item="$it" />


                                    </div>


                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
@endsection

