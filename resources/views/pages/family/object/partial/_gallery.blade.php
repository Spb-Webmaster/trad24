@if($page->gallery_visible)
    <div class="block">
        @if($page->gallery_title)
            <h2 class="_h2">{{ $page->gallery_title  }}</h2>
        @endif
        <div class="ob_gallery pad_t36 ">

            @foreach($page->gallery as $k => $g)
                <div class="mItem">
                    <a href="{{ asset(Storage::disk('public')->url($g['gallery_img'])) }}"
                       data-fancybox="gallery"     data-caption="{{ $g['gallery_img_title'] }}">


                        <img  class="pc_category_img"
                              style="width: auto; height: auto"

                              loading="lazy"
                              src="{{ asset(intervention('252x0', $g['gallery_img'], 'gallery', 'scaleDown')) }}"
                              alt="photo_{{ $k }}">

                    </a></div>
            @endforeach
        </div>
    </div>
@elseif($page->gallery_multiple_visible)
    <div class="block">
        @if($page->gallery_title)
            <h2 class="_h2">{{ $page->gallery_title  }}</h2>
        @endif
        <div class="ob_gallery pad_t36 ">

            @foreach($page->gallery_multiple as $k => $g)
                <div class="mItem">
                    <a href="{{ asset(Storage::disk('public')->url($g)) }}"
                       data-fancybox="gallery">


                        <img  class="pc_category_img"
                              style="width: auto; height: auto"

                              loading="lazy"
                              src="{{ asset(intervention('252x0', $g, 'media', 'scaleDown')) }}"
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

