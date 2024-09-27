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

            @include('pages.catalog.object.partial._object_breadcrumbs')

            @include('pages.catalog.object.partial._object_title')

            @include('pages.catalog.object.partial._object_logo')


            @include('include.menu.object_menu')

            <div class="ob_main_pageHtml ob_main_new block block_1123">

                @if($page->title)
                    <h2 class="_h2" align="center">
                        {{ $page->title  }}
                    </h2>

                @endif



                @if($page->text)
                    <div class="block  pad_t26_important  @if($page->img) page_l @endif">
                        <div class="@if($page->img) page_l__left @endif">
                            <div class="page_page__desc1 desc">
                                {!! $page->text !!}
                            </div>
                        </div>
                        @if($page->img)
                            <div class="page_l__right">

                                @if($page->img)
                                    <div class="desc desc_main__imgR pad_t33 pad_b33">
                                        <img class="pc_category_img" width="228" height="270" loading="lazy"
                                             src="{{ asset(intervention('228x270', $page->img, 'objects')) }}"
                                             alt="{{$page->title}}">

                                    </div>

                                @endif
                            </div>
                        @endif

                    </div>

                @endif

                @if($page->text2)
                    <div class="block page_l2 pad_t20">
                        <div class="page_page__desc2 desc">
                            {!! $page->text2 !!}
                        </div>
                    </div>
                @endif

                @if($page->img2)
                    <div class="block pad_t26  pad_b20 ">
                        <a href="{{ asset(Storage::disk('public')->url($page->img2)) }}" data-fancybox=""><img
                                class="pc_category_img" style="width: 100%; height: auto" loading="lazy"
                                src="{{ asset(Storage::disk('public')->url($page->img2)) }}"
                                alt="{{$page->title}}"></a>
                    </div>
                @endif

                @if($page->n_text3)
                    <div class="block    @if($page->img3) page_r @endif">
                        @if($page->img3)
                            <div class="page_r__left">

                                @if($page->img3)
                                    <a href="{{ asset(Storage::disk('public')->url($page->img3)) }}"
                                       data-fancybox=""><img class="pc_category_img" width="500" height="376" loading="lazy"
                                                             src="{{ asset(intervention('500x376', $page->img3, 'objects')) }}"
                                                             alt="{{$page->title}}"></a>

                                @endif
                            </div>
                        @endif

                        <div class="@if($page->img3) page_r__right @endif">
                            <div class="page_page__desc1 desc pad_b33">
                                {!! $page->text3 !!}
                            </div>
                        </div>

                    </div>
                @endif


                @include('pages.family.object.partial._gallery', ['page'=> $page])

                @include('pages.family.object.partial._video', ['page' => $page])

                @include('pages.family.object.partial._audio', ['page'=> $page])



            </div>

            @include('pages.family.object.partial._object_menu__js')

        </div>
    </main>

@endsection






