@extends('layouts.layout_cabinet')
<x-seo.meta
    title="{{ config('site.constants.site_name') }} - Статьи: {{ ($item->name)??'' }}"
    description="{{ config('site.constants.site_name') }} - Статьи: {{ ($item->name)??'' }}"
    keywords="{{ config('site.constants.site_name') }} - Статьи: {{ ($item->name)??'' }}"
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

                            @include('dashboard.left_bar.left', ['profile' => true])

                        </div>
                    </div>

                    <div class="cabinet__right">

                        {{--   @include('dashboard.menu.cabinet_menu')--}}

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

                                @if(isset($items))

                                    <div class="_articles__foreach">
                                        @foreach($items as $it)
                                            <div class="_articles__item">

                                                <h2 class="_articles_h2_title"><a href="{{ route('cabinet.people_article', ['user_id' => $item->id,  'id' => $it->id]) }}">{{ $it->title }}</a></h2>
                                                <div class="_articles_text desc">{!!   $it->teasertext !!}</div>
                                            </div>
                                            <x-dashboard.user.options.options_article :item="$it" model="App\Models\UserArticleComment" prefix="article"/>
                                            <hr>

                                        @endforeach
                                    </div>
                                    <div class="display_none__">{{ $items->withQueryString()->links('pagination::default') }}</div>
                                @endif





                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
@endsection

