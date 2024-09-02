@extends('layouts.layout')
<x-seo.meta
    title="Поиск - {{ (isset($search))?$search:'' . env('APP_NAME')}}"
    description=""
    keywords=""
/>
@section('content')
    <section class="good_summer"></section>
    <main>
        <div class="block block_1123">
            <div class="block pad_t20">
                <div class="ob_title">
                    <h1 class="h1_title">{{ __('Поиск по объектам') }}</h1>
                </div>
            </div>
            <hr class="p_hr">
            @foreach($items as $item)

                <div class="teaser_mini_img tmg">

                    <div class="tmg__flex">
                        @if(isset($item->religion))
                        <div class="tmg__img">

                            <a href="{{route('page.object.about', ['religion_slug' => $item->religion->slug, 'object_slug' => $item->slug])}}"><img
                                    width="70" height="70" loading="lazy"
                                    src="{{ asset(intervention('70x70', $item->img, 'objects')) }}"
                                    alt="{{$item->title}}"></a>
                        </div>
                        <div class="tmg__title">

                            <div class="tmg__titleText"><a
                                    href="{{route('page.object.about', ['religion_slug' => $item->religion->slug, 'object_slug' => $item->slug])}}">{{ $item->title }}</a>
                            </div>

                            <div class="tmg__religion_area">
                                @if(isset($item->religion))
                                    <span class="tmg__religion"><a
                                            href="{{route('religion', ['slug' => $item->religion->slug])}}">{{ $item->religion->title}}</a></span>
                                @endif

                                @if(isset($item->area) and isset($item->religion))
                                    <span class="tmg__area"><a
                                            href="{{route('religion.area.list', ['slug' => $item->religion->slug, 'id'=> $item->area->id ])}}">{{ $item->area->title}}</a></span>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>

                </div>

            @endforeach


        </div>
    </main>
@endsection




