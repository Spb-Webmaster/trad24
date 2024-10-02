<section class="block slider family_slider">


    <div class="box_title_flex">
        <div class="_h2"><span>{{__('Новости')}}</span>

        </div>
        <div class="_h2__more">
            <div class="parallelogram_wrap">
                <div class="parallelogram"></div>
            </div>
            <a href="{{ route('family_news', ['family_slug' => $item->slug ]) }}"><span>{{__('посмотреть все')}}</span></a></div>

    </div>
    <div class="slick_slider__carusel">
        @if($news)
            @foreach($news as $new)
                @if($new->published)
                <div class=" slick_slide">
                    <div class="slide_link slick_slider__1">
                        <div class="s_img">
                            <a href="{{ route('family_new' , ['family_slug' => $item->slug, 'slug' => $new->slug]) }}">


                                @if($new->teaser)
                                    <img class="pc_category_img" width="360" height="208" loading="lazy"
                                         src="{{ asset(intervention('360x208', $new->teaser, 'object_news')) }}"
                                         alt="{{$new->title}}">
                                @else
                                    <img class="pc_category_img" width="360" height="208" loading="lazy"
                                         src="{{ asset(Storage::disk('public')->url('images/video_poster.jpg')) }}"
                                         alt="{{$new->title}}">
                                @endif

                            </a>
                        </div>
                        <div class="s_title">
                            <a href="{{ route('family_new' , ['family_slug' => $item->slug, 'slug' => $new->slug]) }}"><span>{{ $new->title }}</span></a>
                        </div>
                        <div class="s_date">
                            <span>{{ rusdate3($new->created_at) }}</span>
                        </div>

                    </div>
                </div>
                @endif

            @endforeach
        @endif

    </div>
</section>

