@extends('layouts.layout')
<x-seo.meta
    title="{{($item->title)?:null}}"
    description="{{($item->description)?:null}}"
    keywords="{{($item->keywords)?:null}}"
/>
@section('content')
    <section class="good_summer"></section>
    <main>
        <div class="page_object">

            @include('pages.catalog.object.partial._object_breadcrumbs')

            @include('pages.catalog.object.partial._object_title')

            @include('pages.catalog.object.partial._object_logo')


            @include('include.menu.object_menu')

            <div class="ob_main_pageHtml ob_main_gallery block block_1123">
               <div class="block">
                @if($item->gallery_title)
                    <h2 class="_h2" align="center">
                        {{ $item->gallery_title  }}
                    </h2>
                @else
                    <h2 class="_h2" align="center">
                        {{ __('Фотогалерея') }}
                    </h2>
                @endif

                    @if(isset($item->gallery))

                        <div class="ob_gallery pad_t36  pad_b20 ">

                            @foreach($item->gallery as $k=>$g)
                                <div class="mItem">
                                    <a href="{{ asset(Storage::disk('public')->url($g['gallery_img'])) }}"
                                       data-fancybox="gallery">

                                        <img  class="pc_category_img"
                                              style="width: auto; height: auto"
                                              loading="lazy"
                                              src="{{ asset(intervention('252x0', $g['gallery_img'], 'gallery', 'scaleDown')) }}"
                                              alt="photo_{{ $k }}">


                                    </a>
                                </div>
                            @endforeach

                        </div>
                    @endif

                    @if($item->gallery_desc)
                        <div class="gallery_desc desc">
                            {!! $item->gallery_desc  !!}
                        </div>
                    @endif


               </div>
            </div>

            @include('pages.catalog.object.partial._object_menu__js')

        </div>
    </main>

@endsection




