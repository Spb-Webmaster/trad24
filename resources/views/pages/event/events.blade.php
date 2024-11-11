@extends('layouts.layout')
<x-seo.meta
    title="Календарь событий"
    description="Календарь событий"
    keywords="Календарь событий"
/>
@section('content')
    <main>
        <div class="page_page page_calendar">
            @include('pages.event.partial._breadcrumbs')
            <div class="block">
                <div class="ob_title">
                    <h1 class="h1_title">{{ __('Календарь событий') }}</h1>

                    <span class="ob_subtitle">{{ __('События, новости, информация') }}</span>

                </div>
            </div>

            <div class="block">
                <div class="page_l">
                    <div class="page_l__left">

                        <div class="desc desc_main__content">

                            @if($items)
                                @foreach($items as $item)
                                    <h2 class="_h2"><a
                                            href="{{ route('calendarEvent', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                    </h2>
                                    <div class="desc">
                                        {{ $item->teaser }}
                                    </div>
                                    <div class="color_grey color_grey_14 event_data">
                                       Дата: {{ rusdate3($item->created_at) }}
                                    </div>
                                    <hr>

                                @endforeach

                            @endif

                        </div>

                    </div>
                    <div class="page_l__right">

                        <div class="desc desc_main__imgR pad_t33 pad_b33">

                            <h3 class="pad_b16_important">События</h3>
                            <div class="calendarEvents__js" data-events="{{$array_events}}"></div>
                            <div class="calendarHref__js"
                                 data-link='{{ $array_events_link }}'></div>
                            <div class="calendarHtml__js" data-html='{{ $array_events_title }}'></div>
                            <div id="datepicker1"></div>
                            <div class="datepicker_wrap">
                                <div class="datepicker_display display_none"></div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


        </div><!--.page_page-->

    </main>
@endsection



