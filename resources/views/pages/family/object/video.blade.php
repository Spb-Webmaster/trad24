@extends('layouts.layout')
<x-seo.meta
    title="{{($item->title)?:null}}"
    description="{{($item->description)?:null}}"
    keywords="{{($item->keywords)?:null}}"
/>
@section('content')
    <section class="good_summer"></section>
    <main>
        <div class="page_object">

            @include('pages.catalog.object.partial._object_breadcrumbs')

            @include('pages.catalog.object.partial._object_title')

            @include('pages.catalog.object.partial._object_logo')

            @include('include.menu.object_menu')


            <div class="ob_main_pageHtml ob_main_video block block_850">
                <div class="block">
                    @if($item->video_title)
                        <h2 class="_h2" align="center">
                            {{ $item->video_title  }}
                        </h2>
                    @else
                        <h2 class="_h2" align="center">
                            {{ __('Видеоматериалы') }}
                        </h2>
                    @endif

                    @if(isset($item->video))
                        <div class="ob_video">
                            @if($item->video)
                                @foreach($item->video as $v)

                                    <div class="ob_controls">
                                        @if($v['video_video_title'])
                                            <div class="desc ">
                                                <h4 class="pad_b26_important">{{$v['video_video_title']}}</h4>
                                            </div>
                                        @endif
                                        @if($v['video_video_video'])

                                            <video controls width="840" height="473"
                                                   @if($item->above) poster="{{ asset(intervention('840x473', $item->img, 'videos')) }}" @endif>
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

                    @endif

                </div>
            </div>

            <div class="block block_1123">

                @if(isset($item->video_desc))
                    <div class="block page_l2">
                        <div class="page_page__desc2 desc">
                            {!! $item->video_desc !!}
                        </div>
                    </div>
                @endif

            </div>


            @include('pages.catalog.object.partial._object_menu__js')



        </div>
    </main>

@endsection




