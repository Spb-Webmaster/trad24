<div class="ob_line_wrap logo_plus">
    <div class="ob_line">
        @if($item->img_logo)
            <div class="ob_logo">
                <div class="ob_logo__img"
                     style="background-image: url('{{Storage::disk('moonshine')->url($item->img_logo)}}')"></div>
            </div>
        @else
            <div class="ob_logo">
                <div class="ob_logo__img ob_logo__default_islam"></div>
            </div>
        @endif
    </div>
</div>
