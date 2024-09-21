@extends('layouts.layout')
<x-seo.meta
    title="{{(isset($page->metatitle))? $page->metatitle : $page->title}}"
    description="{{(isset($page->description))? $page->metatitle : null}}"
    keywords="{{(isset($page->keywords))? $page->keywords : null}}"
/>
@section('content')
    <section class="good_summer"></section>
    <main>
        <div class="page_object">

            @include('pages.catalog.object.partial._object_breadcrumbs')

            @include('pages.catalog.object.partial._object_title')

            @include('pages.catalog.object.partial._object_logo')

            @include('include.menu.object_menu')

            <div class="ob_main_pageHtml ob_main_new block block_1123">

                @if($page->title)
                    <h2 class="_h2" align="center">
                        {{ $page->title  }}
                    </h2>

                @endif



                @if($page->text)
                    <div class="block page_l2">
                        <div class="page_page__desc2 desc">
                            {!! $page->text !!}
                        </div>
                    </div>
                @endif

                @if($page->img)
                    <div class="block pad_t26  pad_b20 ">
                        <a href="{{ asset(Storage::disk('public')->url($page->img)) }}" data-fancybox=""><img
                                class="pc_category_img" style="width: 100%; height: auto" loading="lazy"
                                src="{{ asset(Storage::disk('public')->url($page->img)) }}"
                                alt="{{$page->title}}"></a>
                    </div>
                @endif



                    @if($page->gallery_visible)
                        <div class="block">
                            <h2 class="_h2">{{ $page->gallery_title  }}</h2>

                            <div class="ob_gallery pad_t36 ">

                                @foreach($page->gallery as $k => $g)
                                    <div class="mItem">
                                        <a href="{{ asset(Storage::disk('public')->url($g['gallery_img'])) }}"
                                           data-fancybox="gallery">





                                            <img  class="pc_category_img"
                                                  style="width: auto; height: auto"
                                                  loading="lazy"
                                                  src="{{ asset(intervention('252x0', $g['gallery_img'], 'gallery', 'scaleDown')) }}"
                                                  alt="photo_{{ $k }}">




                                        </a></div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($page->gallery_desc)
                        <div class="block">
                            <div class="gallery_desc desc">
                                {!! $page->gallery_desc  !!}
                            </div>
                        </div>
                    @endif


               @if($page->video_visible)
                    <div class="block">
                        <div class="ob_video">
                            @if($page->video)
                                @foreach($page->video as $v)

                                    <div class="ob_controls">
                                        @if($v['video_video_title'])
                                            <div class="desc ">
                                                <h4 class="pad_b26_important">{{$v['video_video_title']}}</h4>
                                            </div>
                                        @endif
                                        @if($v['video_video_video'])

                                            <video controls width="840" height="473">
                                                <source src="{{ asset('/storage/' .$v['video_video_video'])  }}"
                                                        type="video/mp4">
                                            </video>
                                        @endif

                                        @if($v['video_video_youtube'])
                                            {!!   youtube($v['video_video_youtube'], 840,473) !!}
                                        @endif


                                        <div class="video_video_desc desc">
                                            @if($v['video_video_desc'])
                                                {!! $v['video_video_desc'] !!}
                                            @endif
                                        </div>
                                    </div>

                                @endforeach
                            @endif
                        </div>
                    </div>

                @endif

                @if(isset($page->video_desc))
                    <div class="block page_l2">
                        <div class="page_page__desc2 desc">
                            {!! $page->video_desc !!}
                        </div>
                    </div>
                @endif



              @if($page->audio_visible)
                    <div class="block">
                        <div class="ob_video">
                            @if($page->audio)
                                @foreach($page->audio as $v)

                                    <div class="ob_controls">
                                        @if($v['audio_audio_title'])
                                            <div class="desc ">
                                                <h4 class="pad_b26_important">{{$v['audio_audio_title']}}</h4>
                                            </div>
                                        @endif
                                        @if($v['audio_audio_audio'])
                                                <figure class="audio_figure">
                                                    <figcaption></figcaption>
                                                    <div class="flex audio_audio_audio">
                                                        <div class="audio_left">
                                                    <audio controls src="{{ asset('/storage/' .$v['audio_audio_audio'])  }}"></audio>
                                                        </div>
                                                        <div class="audio_right">
                                                    <a download="download" href="{{ asset('/storage/' .$v['audio_audio_audio'])  }}"> {{ __('Скачать audio') }} </a>
                                                        </div>
                                                    </div>
                                                </figure>

                                        @endif
                                        <div class="video_video_desc desc">
                                            @if($v['audio_audio_desc'])
                                                {!! $v['audio_audio_desc'] !!}
                                            @endif
                                        </div>
                                    </div>

                                @endforeach
                            @endif
                        </div>
                    </div>

                @endif

                @if(isset($page->audio_desc))
                    <div class="block page_l2">
                        <div class="page_page__desc2 desc">
                            {!! $page->audio_desc !!}
                        </div>
                    </div>
                @endif



            </div>

            @include('pages.family.object.partial._object_menu__js')

            @if($page->css)
                <style>
                    {!! $page->css !!}
                </style>
            @endif

        </div>
    </main>

@endsection
