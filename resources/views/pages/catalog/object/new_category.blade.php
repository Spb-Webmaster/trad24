@extends('layouts.layout')
<x-seo.meta
    title="Новости - {{$item->title}}"
    description="Новости - {{($item->description)?:null}}"
    keywords="Новости - {{($item->keywords)?:null}}"
/>
@section('content')
    <section class="good_summer"></section>
    <main>
        <div class="page_object">

            @include('pages.catalog.object.partial._object_breadcrumbs')

            @include('pages.catalog.object.partial._object_title')

            @include('pages.catalog.object.partial._object_logo')


            @include('include.menu.object_menu')

            <div class="ob_main_pageHtml ob_main_new_cat block block_850">

                <h2 class="_h2" align="center">
                    {{ __('Новости') }}
                </h2>

                <div class="category_teaser ob_category_teaser pad_t20_important">
                    @foreach($item->regobject_new as $new)
                        <div class=" slick_slide">
                            <div class="slide_link slick_slider__1">
                                <div class="s_img">
                                    <a href="{{asset(route('page.object.new', ['religion_slug'=> $religion->slug,'object_slug'=>$item->slug, 'new_slug' => $new->slug ] ))}}">
                                        <img class="pc_category_img" width="260" height="151" loading="lazy"
                                             src="{{ asset(intervention('260x151', $new->img, 'object_news')) }}"
                                             alt="{{$new->title}}">
                                    </a>
                                </div>
                                <div class="s_title">
                                    <a href="{{asset(route('page.object.new', ['religion_slug'=> $religion->slug,'object_slug'=>$item->slug, 'new_slug' => $new->slug ] ))}}"><span>{{ $new->title }}</span></a>
                                </div>
                                <div class="s_date">
                                    <span>{{ rusdate3($new->created_at) }}</span>
                                </div>

                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

            @include('pages.catalog.object.partial._object_menu__js')

        </div>
    </main>

@endsection





