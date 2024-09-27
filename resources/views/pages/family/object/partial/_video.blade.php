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
