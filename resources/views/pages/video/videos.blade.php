@extends('layouts.layout')
<x-seo.meta
    title="{{__('Видеоматериалы сайта опубликованы с различных открытых источников')}}"
    description="{{__('Видеоматериалы, видео, новости и с ютуба, традиционные религии  России')}}"
    keywords="{{__('Видео, ссылки, новости сайта')}}"
/>
@section('content')
    <main>

        <div class="block cat_title">
            <div class="box_title_flex">
                <div class="_h2"><span>{{__('Видеоматериалы')}}</span>

                </div>
                <div class="_h2__more">
                    <div class="parallelogram_wrap">
                        <div class="parallelogram"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="block category_teaser cat__padding_margin ">


            @foreach($videos as $video)
                <div class=" slick_slide">
                    <div class="slide_link slick_slider__1">
                        <div class="s_img">
                            <a href="{{asset(route('video', $video->slug))}}">
                                <div class="white_circle responce_item__circle">
                                    <span class="white_circle__redplay"></span>
                                </div>
                                @if($video->img)
                                    <img class="pc_category_img" width="380" height="220" loading="lazy"
                                         src="{{ asset(intervention('380x220', $video->img, 'videos')) }}"
                                         alt="{{$video->title}}">
                                @else
                                    <img class="pc_category_img" width="380" height="220" loading="lazy"
                                         src="{{ asset(Storage::disk('public')->url('images/video_poster.jpg')) }}"
                                         alt="{{$video->title}}">
                                @endif
                            </a>
                        </div>
                        <div class="s_title">
                            <a href="{{asset(route('info', $video->slug))}}"><span>{{ $video->title }}</span></a>
                        </div>
                        <div class="s_date">
                            <span>{{ rusdate3($video->created_at) }}</span>
                        </div>

                    </div>
                </div>

            @endforeach
        </div>
        <div class="block">
            {{ $videos->withQueryString()->links('pagination::default') }}
        </div>
    </main>
@endsection





