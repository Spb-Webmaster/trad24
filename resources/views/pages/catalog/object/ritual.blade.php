@extends('layouts.layout')
<x-seo.meta
    title="Полезная информация - {{($item->title)?:null}}"
    description="Полезная информация - {{($item->description)?:null}}"
    keywords="Полезная информация - {{($item->keywords)?:null}}"
/>
@section('content')
    <section class="good_summer"></section>
    <main>
        <div class="page_object">

            @include('pages.catalog.object.partial._object_breadcrumbs')

            @include('pages.catalog.object.partial._object_title')

            @include('pages.catalog.object.partial._object_logo')


            @include('include.menu.object_menu')

            <div class="ob_main_pageHtml ob_main_info block block_850">
                <div class="block">
                @if($item->info_title)
                    <h2 class="_h2" align="center">
                        {{ $item->info_title  }}
                    </h2>
                @else
                    <h2 class="_h2" align="center">
                        {{ __('Обряды') }}
                    </h2>
                @endif

                    @if($item->info_desc)
                        <div class="desc info_desc pad_t20 pad_b20">{!!  $item->info_desc  !!}</div>
                    @endif
                </div>
            </div>

            @include('pages.catalog.object.partial._object_menu__js')

        </div>
    </main>

@endsection




