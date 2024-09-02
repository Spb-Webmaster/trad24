@if(isset($item->regobject_page) and count($item->regobject_page))


    @if(!isset($active))
        @php
            $active  =  0
        @endphp
    @endif
    <div class="block block_1123">
        <div class="block">

            <ul class="ob_menu__for_leftmenu m_l__js">

                @foreach($item->regobject_page as  $link)


                    @if($link->url)

                        <li><a target="_blank" href="{{$link->url}}"><span>{{ $link->title }}</span></a></li>
                    @else
                        <li class="@if($link->id == $active) active @endif"><a
                                href="{{asset(route('page.object.page', ['religion_slug'=> $religion->slug,'object_slug'=>$item->slug, 'page_slug' => $link->slug ] ))}}"><span>{{ $link->title }}</span></a>
                        </li>
                    @endif

                @endforeach

            </ul>

        </div>
    </div>
@endif
