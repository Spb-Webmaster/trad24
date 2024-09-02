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
            <li class="{{ active_linkMenu(asset(route('page.object.about', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] )), 'find') }}">
                <a class="{{ active_linkMenu(asset(route('page.object.about', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ), 'find') }} add__mobile_menu upper_level @if(count($item->regobject_about)) arrow_down @endif"
                   href="{{ route('page.object.about', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>
                        О нас</span></a>


                @if(count($item->regobject_about))

                    <ul class="submenu">
                        @foreach($item->regobject_about as $regobject_about)

                            @if($regobject_about->url)
                                <li class="">
                                    <a class="add__mobile_menu"
                                       href="{{ asset($regobject_about->url) }}">{{ $regobject_about->title  }}</a>
                                </li>
                            @else
                                <li class="{{ active_linkMenu(asset(route('page.object.about.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug,  'slug' => $regobject_about->slug ]))) }}">
                                    <a class="{{ active_linkMenu(asset(route('page.object.about.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug,  'slug' => $regobject_about->slug ]))) }} add__mobile_menu"
                                       href="{{ route('page.object.about.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug , 'slug' => $regobject_about->slug ]) }}">{{ $regobject_about->title  }}</a>
                                </li>
                            @endif

                        @endforeach

                    </ul>
                @endif

            </li>


            <li class="{{ active_linkMenu(asset(route('page.object.new_category', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ), 'find') }}">
                <a class="{{ active_linkMenu(asset(route('page.object.new_category', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ), 'find') }} add__mobile_menu upper_level"
                   href="{{ route('page.object.new_category', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Новости</span></a>
            </li>


            <li><a class="@if(count($item->regobject_media)) arrow_down @endif" href="#"><span>Медиа</span></a>
                @if(count($item->regobject_media))

                    <ul class="submenu">
                        @foreach($item->regobject_media as $regobject_media)

                            @if($regobject_media->url)
                                <li class="">
                                    <a class="add__mobile_menu"
                                       href="{{ asset($regobject_media->url) }}">{{ $regobject_media->title  }}</a>
                                </li>
                            @else
                            <li class="{{ active_linkMenu(asset(route('page.object.media', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug,  'slug' => $regobject_media->slug ]))) }}">
                                <a class="{{ active_linkMenu(asset(route('page.object.media', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug,  'slug' => $regobject_media->slug ]))) }} add__mobile_menu"
                                   href="{{ route('page.object.media', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug , 'slug' => $regobject_media->slug ]) }}">{{ $regobject_media->title  }}</a>
                            </li>
                            @endif
                        @endforeach

                    </ul>
                @endif
            </li>

            <li class="{{ active_linkMenu(asset(route('page.object.faq', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}">
                <a class="{{ active_linkMenu(asset(route('page.object.faq', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu upper_level"
                   href="{{ route('page.object.faq', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Вопрос-ответ</span></a>
            </li>



            <li class="{{ active_linkMenu(asset(route('page.object.activity', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ), 'find'  ) }}">
                <a class="{{ active_linkMenu(asset(route('page.object.activity', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu upper_level  @if(count($item->regobject_activity)) arrow_down @endif"
                   href="{{ asset(route('page.object.activity', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ) }}"><span>{{ __('Деятельность') }}</span></a>

                @if(count($item->regobject_activity))

                    <ul class="submenu">
                        @foreach($item->regobject_activity as $regobject_activity)

                            @if($regobject_activity->url)
                                <li class="">
                                    <a class="add__mobile_menu"
                                       href="{{ asset($regobject_activity->url) }}">{{ $regobject_activity->title  }}</a>
                                </li>
                            @else
                                <li class="{{ active_linkMenu(asset(route('page.object.activity.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug,  'slug' => $regobject_activity->slug ]))) }}">
                                    <a class="{{ active_linkMenu(asset(route('page.object.activity.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug,  'slug' => $regobject_activity->slug ]))) }} add__mobile_menu"
                                       href="{{ route('page.object.activity.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug , 'slug' => $regobject_activity->slug ]) }}">{{ $regobject_activity->title  }}</a>
                                </li>
                            @endif

                        @endforeach

                    </ul>
                @endif
            </li>


            <li class="{{ active_linkMenu(asset(route('page.object.info', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ), 'find'  ) }}">
                <a class="{{ active_linkMenu(asset(route('page.object.info', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu upper_level  @if(count($item->regobject_info)) arrow_down @endif"
                   href="{{ asset(route('page.object.info', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ) }}"><span>{{ __('Информация') }}</span></a>

                @if(count($item->regobject_info))

                    <ul class="submenu">
                        @foreach($item->regobject_info as $regobject_info)

                            @if($regobject_info->url)
                                <li class="">
                                    <a class="add__mobile_menu"
                                       href="{{ asset($regobject_info->url) }}">{{ $regobject_info->title  }}</a>
                                </li>
                            @else
                                <li class="{{ active_linkMenu(asset(route('page.object.info.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug,  'slug' => $regobject_info->slug ]))) }}">
                                    <a class="{{ active_linkMenu(asset(route('page.object.info.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug,  'slug' => $regobject_info->slug ]))) }} add__mobile_menu"
                                       href="{{ route('page.object.info.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug , 'slug' => $regobject_info->slug ]) }}">{{ $regobject_info->title  }}</a>
                                </li>
                            @endif

                        @endforeach

                    </ul>
                @endif
            </li>


            <li class="{{ active_linkMenu(asset(route('page.object.ritual', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ), 'find'  ) }}">
                <a class="{{ active_linkMenu(asset(route('page.object.ritual', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu upper_level  @if(count($item->regobject_ritual)) arrow_down @endif"
                   href="{{ asset(route('page.object.ritual', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) ) }}"><span>{{ __('Обряды') }}</span></a>

                @if(count($item->regobject_ritual))

                    <ul class="submenu">
                        @foreach($item->regobject_ritual as $regobject_ritual)

                            @if($regobject_ritual->url)
                                <li class="">
                                    <a class="add__mobile_menu"
                                       href="{{ asset($regobject_ritual->url) }}">{{ $regobject_ritual->title  }}</a>
                                </li>
                            @else
                                <li class="{{ active_linkMenu(asset(route('page.object.ritual.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug,  'slug' => $regobject_ritual->slug ]))) }}">
                                    <a class="{{ active_linkMenu(asset(route('page.object.ritual.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug,  'slug' => $regobject_ritual->slug ]))) }} add__mobile_menu"
                                       href="{{ route('page.object.ritual.page', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug , 'slug' => $regobject_ritual->slug ]) }}">{{ $regobject_ritual->title  }}</a>
                                </li>
                            @endif

                        @endforeach

                    </ul>
                @endif
            </li>



            <li class="{{ active_linkMenu(asset(route('page.object.contact', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }}">
                <a class="{{ active_linkMenu(asset(route('page.object.contact', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) )) }} add__mobile_menu upper_level"
                   href="{{ route('page.object.contact', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><span>Контакты</span></a>
            </li>

        </ul>
    </div>

</div>
<div class="ob_menu_hor__js ob_menu_hor__css"></div>

