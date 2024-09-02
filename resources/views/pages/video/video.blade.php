@extends('layouts.layout')
<x-seo.meta
    title="{{(isset($video->metatitle)) ? $video->metatitle : $video->title}}"
    description="{{($video->description)?:null}}"
    keywords="{{($video->keywords)?:null}}"
/>
@section('content')
    <main>
        <div class="page_site">
            @include('pages.video.partial._breadcrumbs')
            <div class="block">
                <div class="ob_title"><h1 class="h1_title">{{ $video->title }}</h1></div>
            </div>
            <div class="block">
                <div class="ob_date"><span>{{ rusdate3($video->created_at) }}</span></div>
            </div>
            <div class="block">
                <div class="ob_video">
                    @if($video->video)
                        @foreach($video->video as $v)

                            <div class="ob_controls">
                                @if($v['video_video_title'])
                                    <div class="video_video_title">
                                        <h2>{{$v['video_video_title']}}</h2>
                                    </div>
                                @endif
                                @if($v['video_video_video'])

                                    <video controls width="840" height="473"  @if($video->above) poster="{{ asset(intervention('840x473', $video->img, 'videos')) }}" @endif>
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


        </div>
    </main>
@endsection






