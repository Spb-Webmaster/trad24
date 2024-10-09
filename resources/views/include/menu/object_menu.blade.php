<div class="ob_menu_hor">
    <div class="ob_gamburger">
        <div class="gamburger menu-trigger">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div class="ob_gamburger__menu"><span>{{ __('Menu') }}</span></div>
    </div>


    <div class="ob_menu_hor__ul">

        <ul class="top_menu">
            <li class="{{ active_linkMenu(asset(route('family', ['slug' => $item->slug])), 'find')}}">
                <a class="{{ active_linkMenu(asset(route('family', ['slug' => $item->slug])), 'find')}} add__mobile_menu upper_level @if(count($item->family_main)) arrow_down @endif"
                   href="{{ route('family', ['slug' => $item->slug]) }}"><span>О нас</span></a>


                @if(count($item->family_main))

                    <ul class="submenu">
                        @foreach($item->family_main as $s)

                            @if($s->url)
                                <li >
                                    <a class="add__mobile_menu"
                                       href="{{ asset($s->url) }}">{{ $s->title  }}</a>
                                </li>
                            @else
                                <li class="{{ active_linkMenu(asset(route('family_main', ['family_slug' => $item->slug, 'slug' => $s->slug] )), 'find')}}">
                                    <a class="add__mobile_menu {{ active_linkMenu(asset(route('family_main', ['family_slug' => $item->slug, 'slug' => $s->slug] )), 'find')}}  add__mobile_menu"
                                       href="{{ asset(route('family_main', ['family_slug' => $item->slug, 'slug' => $s->slug] )) }}">{{ $s->title  }}</a>
                                </li>
                            @endif

                        @endforeach

                    </ul>
                @endif

            </li>


            <li class="{{ active_linkMenu(asset(route('family_news', ['family_slug' => $item->slug ])), 'find') }}">
                <a class="add__mobile_menu arrow_down upper_level {{ active_linkMenu(asset(route('family_news', ['family_slug' => $item->slug ])), 'find') }}"
                   href="{{ route('family_news', ['family_slug' => $item->slug ]) }}"><span>Новости</span></a>
            </li>


            <li class="">

            <a class="add__mobile_menu @if(count($item->family_media)) arrow_down @endif" href="#"><span>Медиа</span></a>
                @if(count($item->family_media))

                    <ul class="submenu">
                        @foreach($item->family_media as $s)

                            @if($s->url)
                                <li class="add__mobile_menu">
                                    <a class="add__mobile_menu"
                                       href="{{ asset($s->url) }}"  target="_blank">{{ $s->title  }}</a>
                                </li>
                            @else
                                <li class="add__mobile_menu {{ active_linkMenu(asset(route('family_media', ['family_slug' => $item->slug, 'slug' => $s->slug])), 'find')}}">
                                <a class="add__mobile_menu {{ active_linkMenu(asset(route('family_media', ['family_slug' => $item->slug, 'slug' => $s->slug])), 'find')}}"
                                   href="{{ asset(route('family_media', ['family_slug' => $item->slug, 'slug' => $s->slug])) }}">{{ $s->title  }}</a>
                            </li>
                            @endif
                        @endforeach

                    </ul>
                @endif
            </li>


            <li class="{{ active_linkMenu(asset(route('family_galleries', ['family_slug' => $item->slug ])), 'find') }}">
                <a class="add__mobile_menu upper_level {{ active_linkMenu(asset(route('family_galleries', ['family_slug' => $item->slug ])), 'find') }}"
                   href="{{ route('family_galleries', ['family_slug' => $item->slug ]) }}"><span>Фотогалереи</span></a>
            </li>






            <li class="{{ active_linkMenu(asset(route('family_peoples', ['family_slug' => $item->slug])), 'find')}}">
                <a class="add__mobile_menu @if(count($item->family_people)) arrow_down @endif {{ active_linkMenu(asset(route('family_peoples', ['family_slug' => $item->slug])), 'find')}}" href="{{ asset(route('family_peoples', ['family_slug' => $item->slug])) }}"><span>Выдающиеся люди</span></a>
                @if(count($item->family_people))

                    <ul class="submenu">
                        @foreach($item->family_people as $s)

                            @if($s->url)
                                <li class="">
                                    <a class="add__mobile_menu"
                                       href="{{ asset($s->url) }}"  target="_blank">{{ $s->title  }}</a>
                                </li>
                            @else
                                <li class="{{ active_linkMenu(asset(route('family_people', ['family_slug' => $item->slug, 'slug' => $s->slug])), 'find')}}">
                                    <a class="add__mobile_menu {{ active_linkMenu(asset(route('family_people', ['family_slug' => $item->slug, 'slug' => $s->slug])), 'find')}}"
                                       href="{{ asset(route('family_people', ['family_slug' => $item->slug, 'slug' => $s->slug])) }}">{{ $s->title  }}</a>
                                </li>
                            @endif
                        @endforeach

                    </ul>
                @endif
            </li>

            <li class="{{ active_linkMenu(asset(route('family_cultures', ['family_slug' => $item->slug])), 'find')}}">
                <a class="add__mobile_menu @if(count($item->family_culture)) arrow_down @endif {{ active_linkMenu(asset(route('family_cultures', ['family_slug' => $item->slug])), 'find')}}" href="{{ asset(route('family_cultures', ['family_slug' => $item->slug])) }}"><span>Культурное наследие</span></a>
                @if(count($item->family_culture))

                    <ul class="submenu">
                        @foreach($item->family_culture as $s)

                            @if($s->url)
                                <li class="">
                                    <a class="add__mobile_menu"
                                       href="{{ asset($s->url) }}" target="_blank">{{ $s->title  }}</a>
                                </li>
                            @else
                                <li class="{{ active_linkMenu(asset(route('family_culture', ['family_slug' => $item->slug, 'slug' => $s->slug])), 'find')}}">
                                    <a class="add__mobile_menu {{ active_linkMenu(asset(route('family_culture', ['family_slug' => $item->slug, 'slug' => $s->slug])), 'find')}}"
                                       href="{{ asset(route('family_culture', ['family_slug' => $item->slug, 'slug' => $s->slug]))  }}">{{ $s->title  }}</a>
                                </li>
                            @endif
                        @endforeach

                    </ul>
                @endif
            </li>


        </ul>
    </div>

</div>
<div class="ob_menu_hor__js ob_menu_hor__css"></div>

