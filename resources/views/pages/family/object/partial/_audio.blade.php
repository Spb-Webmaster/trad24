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

