@extends('layouts.layout')
<x-seo.meta
    title="Поиск - {{ (isset($search))?$search:'' . config('app.app_name')}}"
    description=""
    keywords=""
/>
@section('content')
    <section class="good_summer"></section>
    <main>
        <div class="block block_1123">
            <div class="block pad_t20">
                <div class="ob_title">
                    <h1 class="h1_title">{{ __('Поиск по фамилиям') }}</h1>
                </div>
            </div>
            <div class="pad_b40_important"></div>
            @foreach($items as $item)

                <div class="teaser_mini_img tmg">

                    <div class="tmg__flex">
                        <div class="tmg__img">

                            <a href="{{ route('family', ['slug' => $item->slug ]) }}">
                                @if($item->f_img)
                                    <img
                                        width="70" height="70" loading="lazy"
                                        src="{{ asset(intervention('70x70', $item->f_img, 'objects')) }}"
                                        alt="{{$item->title}}"/>
                                @else
                                    <img
                                        width="70" height="70" loading="lazy"
                                        src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCAwQzguMDU5NSAwIDAgOC4wNTk1IDAgMThDMCAyNy45NDA1IDguMDU5NSAzNiAxOCAzNkMyNy45NDA1IDM2IDM2IDI3Ljk0MDUgMzYgMThDMzYgOC4wNTk1IDI3Ljk0MDUgMCAxOCAwWk0xOCA3LjUwMDA3QzIxLjcyMTUgNy41MDAwNyAyNC43NSAxMC41Mjg2IDI0Ljc1IDE0LjI1MDFDMjQuNzUgMTcuOTcxNiAyMS43MjE1IDIxLjAwMDEgMTggMjEuMDAwMUMxNC4yNzg1IDIxLjAwMDEgMTEuMjUgMTcuOTcxNiAxMS4yNSAxNC4yNTAxQzExLjI1IDEwLjUyODYgMTQuMjc4NSA3LjUwMDA3IDE4IDcuNTAwMDdaTTcuOTQ1NTEgMjkuMDk4NEMxMC42MDk1IDMxLjUxNDkgMTQuMTMgMzIuOTk5OSAxOCAzMi45OTk5QzIxLjg3IDMyLjk5OTkgMjUuMzkwNSAzMS41MTQ5IDI4LjA1NDUgMjkuMDk4NEMyNi43ODU1IDI2LjE2MTQgMjIuNzc2IDIzLjk5OTkgMTggMjMuOTk5OUMxMy4yMjQgMjMuOTk5OSA5LjIxNDUxIDI2LjE2MTQgNy45NDU1MSAyOS4wOTg0WiIgZmlsbD0iI0UwRTBFMCIvPgo8L3N2Zz4K"
                                        alt="{{$item->title}}"/>
                                @endif
                            </a>
                        </div>
                        <div class="tmg__title">

                            <div class="tmg__titleText"><a href="{{ route('family', ['slug' => $item->slug ]) }}">
                                    {{ $item->title }}</a>
                            </div>

                            <div class="tmg__religion_area">

                                @if($item->family_new)
                                <span class="tmg__religion">
                                        <a
                                            href="{{ route('family_news', ['family_slug' => $item->slug]) }}">Новости</a>
                                    </span>
                                @endif

                     {{--           <span class="tmg__area"><a
                                        href="#">title</a></span>--}}

                            </div>
                        </div>
                    </div>

                </div>

            @endforeach


        </div>
    </main>
@endsection




