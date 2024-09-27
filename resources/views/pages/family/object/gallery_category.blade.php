@extends('layouts.layout')
<x-seo.meta
    title="Фотогалерея - {{$item->title}}"
    description="Фотогалерея - {{($item->description)?:null}}"
    keywords="Фотогалерея - {{($item->keywords)?:null}}"
/>
@section('content')
    <section class="good_summer"></section>
    <main>
        <div class="page_object">

            @include('pages.family.object.partial._object_breadcrumbs')

            @include('pages.family.object.partial._object_title')

            @include('pages.family.object.partial._object_logo')


            @include('include.menu.object_menu')

            <div class="ob_main_pageHtml ob_main_new_cat block block_850">

                <h2 class="_h2" align="center">
                    {{ __('Фотогалерея') }}
                </h2>

                <div class="category_teaser ob_category_teaser pad_t20_important">
                   @if(isset($pages))
                    @foreach($pages as $page)
                        <div class=" slick_slide">
                            <div class="slide_link slick_slider__1">
                                <div class="s_img">
                                    <a href="{{asset(route('family_gallery', ['family_slug'=> $item->slug,'slug'=>$page->slug ] ))}}">
                                        <img class="pc_category_img" width="260" height="151" loading="lazy"
                                             src="{{ asset(intervention('260x151', $page->teaser, 'object_news')) }}"
                                             alt="{{$page->title}}">
                                    </a>
                                </div>
                                <div class="s_title">
                                    <a href="{{asset(route('family_gallery', ['family_slug'=> $item->slug,'slug'=>$page->slug ] ))}}"><span>{{ $page->title }}</span></a>
                                </div>
                                <div class="s_date">
                                    <span>{{ rusdate3($page->created_at) }}</span>
                                </div>

                            </div>
                        </div>

                    @endforeach
                    @endif
                </div>
            </div>

            @include('pages.family.object.partial._object_menu__js')

        </div>
    </main>

@endsection





