@extends('layouts.layout')
<x-seo.meta
    title="{{(isset($page->metatitle))? $page->metatitle : $page->title}}"
    description="{{(isset($page->description))? $page->metatitle : null}}"
    keywords="{{(isset($page->keywords))? $page->keywords : null}}"
/>
@section('content')
    <section class="good_summer"></section>
    <main>
        <div class="page_object">

            @include('pages.family.object.partial._object_breadcrumbs')

            @include('pages.family.object.partial._object_title')

            @include('pages.family.object.partial._object_logo')

            @include('include.menu.object_menu')

            <div class="ob_main_pageHtml ob_main_new block block_1123">

                @if($page->title)
                    <h2 class="_h2" align="center">
                        {{ $page->title  }}
                    </h2>

                @endif



                @if($page->text)
                    <div class="block page_l2">
                        <div class="page_page__desc2 desc">
                            {!! $page->text !!}
                        </div>
                    </div>
                @endif

                @if($page->img)
                    <div class="block pad_t26  pad_b20 ">
                        <a href="{{ asset(Storage::disk('public')->url($page->img)) }}" data-fancybox=""><img
                                class="pc_category_img" style="width: 100%; height: auto" loading="lazy"
                                src="{{ asset(Storage::disk('public')->url($page->img)) }}"
                                alt="{{$page->title}}"></a>
                    </div>
                @endif

               @include('pages.family.object.partial._gallery', ['page' => $page])

               @include('pages.family.object.partial._video', ['page'=> $page])

               @include('pages.family.object.partial._audio', ['page' => $page])




            </div>

            @include('pages.family.object.partial._object_menu__js')

            @if($page->css)
                <style>
                    {!! $page->css !!}
                </style>
            @endif

        </div>
    </main>

@endsection
