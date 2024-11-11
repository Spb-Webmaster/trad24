@extends('layouts.layout')
<x-seo.meta
    title="{{(isset($item->metatitle)) ? $item->metatitle : $item->title}}"
    description="{{($item->description)?:null}}"
    keywords="{{($item->keywords)?:null}}"
/>
@section('content')
    <main>
        <div class="page_page page_calendar">
            @include('pages.event.partial._breadcrumbs')
            <div class="block">
                <div class="ob_title">
                    <h1 class="h1_title">{{ $item->title }}</h1>
                    @if($item->subtitle)
                        <span class="ob_subtitle">{{ $item->subtitle }}</span>
                    @endif
                </div>
            </div>
            <div class="block">
                <div class="page_l">
                    <div class="page_l__left">

                        <div class="desc desc_main__content">


                            <div class="page_content desc">
                                {!! $item->text !!}
                            </div>
                            @if($item->img)
                                <div class="page_content__img">
                                    <img src="{{ Storage::url($item->img) }}" alt="img"/>

                                </div>
                            @endif
                            <div class="page_content desc">
                                {!! $item->text2 !!}
                            </div>
                            @if($item->img2)
                                <div class="page_content__img">
                                    <img src="{{ Storage::url($item->img2) }}" alt="img"/>
                                </div>
                            @endif




                                    <div class="color_grey color_grey_14 event_data">
                                        Дата: {{ rusdate3($item->created_at) }}
                                    </div>


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







