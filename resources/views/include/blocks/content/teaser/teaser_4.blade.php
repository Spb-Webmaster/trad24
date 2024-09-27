<div class="block">
<div class="teaser_4 pad_t40 pad_b20">

  @foreach($items as $item)

        <div class="teaser_4__item t_item_4">

            <div class="t_item_4__img">
                <a href="{{ route('family', ['slug' => $item->slug ]) }}"><img width="277" height="209" loading="lazy"
                     src="{{ asset(intervention('277x209', $item->img, 'objects')) }}"
                                alt="{{$item->title}}"></a>
            </div>
            <div class="t_item_4__title">
                <a href="{{ route('family', ['slug' => $item->slug ]) }}">{{ $item->title }}</a>
            </div>

        </div>

    @endforeach



</div>
    {{ $items->withQueryString()->links('pagination::default') }}


</div>
