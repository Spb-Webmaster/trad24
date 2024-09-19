<div class="block">
<div class="teaser_list">

  @foreach($items as $item)

            <div class="t_item___title">
                <a href="{{ route('family', ['slug' => $item->slug ]) }}">{{ $item->title }}</a>
            </div>

    @endforeach


</div>
    {{ $items->withQueryString()->links('pagination::default') }}


</div>
