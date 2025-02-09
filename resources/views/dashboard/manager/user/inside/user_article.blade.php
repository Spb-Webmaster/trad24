@extends('layouts.layout_cabinet')
<x-seo.meta
    title="{{ ($it->title)??'' }} | {{ config('site.constants.site_name') }}"
    description="{{ ($it->title)??'' }} | {{ config('site.constants.site_name') }}"
    keywords="{{ ($it->title)??'' }} | {{ config('site.constants.site_name') }}"
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
                                <h3 class="F_h1">{{ __('Профиль') }}</h3>
                                <div class="F_h2 pad_t5"><span>{{__('Профиль можно отредактировать самостоятельно.')}}</span></div>
                            </div>
                            <div class="dashboardBox dashboardBox__a_user ">

                                <x-dashboard.user.user_avatar_email_phone__mini :user="$item"
                                                                                backround="background_biruza"/>

                                @include('dashboard.manager.user._partial.menu')

                                <div class="_articles__foreach">
                                    <div class="_articles__item">

                                        <h2 class="_articles_h2_title">{{ $it->title }}</h2>
                                        <div class="_articles_text desc">{!!   $it->article !!}</div>
                                    </div>


                                </div>

                                <x-dashboard.user.options.options_article :item="$it" model="App\Models\UserArticleComment" prefix="article"/>

                                <hr>


                                <div class="web_comments">


                                    @livewire('comments.comment-text-manager', ['article_id' => $it->id,'model'=>"App\Models\UserArticleComment", 'prefix' =>"article"])

                                </div>

                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
@endsection


