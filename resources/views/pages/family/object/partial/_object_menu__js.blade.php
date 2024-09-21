@if(isset($item->family_page) and count($item->family_page))


    @if(!isset($active))
        @php
            $active  =  0
        @endphp
    @endif
    <div class="block block_1123">
        <div class="block">

            <ul class="ob_menu__for_leftmenu m_l__js">

                @foreach($item->family_page as  $link)


                    @if($link->url)

                        <li><a target="_blank" href="{{$link->url}}"><span>{{ $link->title }}</span></a></li>
                    @else
                        <li class="@if($link->id == $active) active @endif"><a
                                href="{{ asset(route('family_page', ['family_slug' => $item->slug, 'slug' => $link->slug, ])) }}"><span>{{ $link->title }}</span></a>
                        </li>
                    @endif

                @endforeach

            </ul>

        </div>
    </div>
@endif
