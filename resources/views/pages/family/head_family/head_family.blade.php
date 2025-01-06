@extends('layouts.layout')
<x-seo.meta
    title="Главы фамилий | список глав фамилий"
    description="Главы фамилий"
    keywords="Главы фамилий"
/>
@section('content')
    <main>
        <div class="page_page">
            <div class="block pad_t20">
                <div class="ob_title">
                    <h1 class="h1_title">Главы фамилий</h1>

                </div>
            </div>
            <div class="block block_850 page_l2 pad_t20">
                <div class="contener__222">
                <div class="head_family desc">

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

                                    <div class="tmg__titleText">
                                        <a href="{{ route('family', ['slug' => $item->slug ]) }}">
                                            {{ (isset($item->f_name))? $item->f_name : $item->title }}</a>
                                    </div>

                                    <div class="tmg__religion_area">
                                     <span class="tmg__religion">
                                     {{--   <a href="#">Новости</a>--}}
                                    </span>
                                    </div>
                                </div>
                                <div class="tmg__birthday">
                                    {{ (isset($item->f_birthday))?rusdate3($item->f_birthday):'' }}
                                </div>
                                <div class="tmg__phone_city">
                                    <div class="tmg__phone">
                                        {{ (isset($item->f_phone))?phone($item->f_phone):'' }}
                                    </div>
                                    <div class="tmg__city">
                                        {{ (isset($item->f_city))?$item->f_city:'' }}
                                    </div>
                                </div>


                            </div>

                        </div>




                        @endforeach

                </div>
            </div>
            </div>

            <div class="block">
            {{ $items->withQueryString()->links('pagination::default') }}
            </div>
        </div><!--.page_page-->
    </main>
@endsection






