<div class="ob_line_wrap logo_plus">
    <div class="ob_line">
        @if($item->logo)
            <div class="ob_logo">
                <div class="ob_logo__img"
                     style="background-image: url('{{Storage::disk('moonshine')->url($item->logo)}}')"></div>
            </div>
        @else
            <div class="ob_logo">
                <div class="ob_logo__img ob_logo__default_{{ $religion->slug  }}"></div>
            </div>
        @endif
    </div>
</div>
