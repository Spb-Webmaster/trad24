@extends('layouts.layout')
<x-seo.meta
    title="{{__('Новости сайта, информация, публикации из СМИ')}}"
    description="{{__('Новости о традиционных религий  России')}}"
    keywords="{{__('Новости, ссылки, новости сайта')}}"
/>
@section('content')
    <main>
        <div class="block cat_title">
            <div class="box_title_flex">
                <div class="_h2"><span>{{__('Новости')}}</span></div>
                <div class="_h2__more">
                    <div class="parallelogram_wrap">
                        <div class="parallelogram"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="block category_teaser cat__padding_margin">
        @foreach($news as $new)
                <div class=" slick_slide">
                    <div class="slide_link slick_slider__1">
                        <div class="s_img">
                            <a href="{{asset(route('info', $new->slug))}}">

                                @if($new->img)
                                    <img class="pc_category_img" width="380" height="220" loading="lazy"
                                         src="{{ asset(intervention('380x220', $new->img, 'infos')) }}"
                                         alt="{{$new->title}}">
                                @else
                                    <img class="pc_category_img" width="380" height="220" loading="lazy"
                                         src="{{ asset(Storage::disk('public')->url('images/video_poster.jpg')) }}"
                                         alt="{{$new->title}}">
                                @endif

                            </a>
                        </div>
                        <div class="s_title">
                            <a href="{{asset(route('info', $new->slug))}}"><span>{{ $new->title }}</span></a>
                        </div>
                        <div class="s_date">
                            <span>{{ rusdate3($new->created_at) }}</span>
                        </div>

                    </div>
                </div>


        @endforeach
        </div>
        <div class="block">
        {{ $news->withQueryString()->links('pagination::default') }}
        </div>
    </main>
@endsection





