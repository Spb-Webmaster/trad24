@extends('layouts.layout')
<x-seo.meta
    title="{{($new->title)?:null}}"
    description="{{($new->description)?:null}}"
    keywords="{{($new->keywords)?:null}}"
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

                @if($new->title)
                    <h2 class="_h2" align="center">
                        {{ $new->title  }}
                    </h2>

                @endif



                    @if($new->text)
                        <div class="block  pad_t26_important  @if($new->pageimg1) page_l @endif">
                            <div class="@if($new->pageimg1) page_l__left @endif">
                                <div class="page_page__desc1 desc">
                                    {!! $new->text !!}
                                </div>
                            </div>
                            @if($new->pageimg1)
                                <div class="page_l__right">

                                    @if($new->pageimg1)
                                        <div class="desc desc_main__imgR pad_t33 pad_b33">
                                            <img class="pc_category_img" width="228" height="270" loading="lazy"
                                                 src="{{ asset(intervention('228x270', $new->pageimg1, 'objects')) }}"
                                                 alt="{{$new->title}}">

                                        </div>

                                    @endif
                                </div>
                            @endif

                        </div>

                    @endif

                    @if($new->text2)
                        <div class="block page_l2 pad_t20">
                            <div class="page_page__desc2 desc">
                                {!! $new->text2 !!}
                            </div>
                        </div>
                    @endif

                    @if($new->pageimg2)
                        <div class="block pad_t26  pad_b20 ">
                            <a href="{{ asset(Storage::disk('public')->url($new->pageimg2)) }}" data-fancybox=""><img
                                    class="pc_category_img" style="width: 100%; height: auto" loading="lazy"
                                    src="{{ asset(Storage::disk('public')->url($new->pageimg2)) }}"
                                    alt="{{$new->title}}"></a>
                        </div>
                    @endif

                    @if($new->text3)
                        <div class="block    @if($new->pageimg3) page_r @endif">
                            @if($new->pageimg3)
                                <div class="page_r__left">

                                    @if($new->pageimg3)
                                        <a href="{{ asset(Storage::disk('public')->url($new->pageimg3)) }}"
                                           data-fancybox=""><img class="pc_category_img" width="500" height="376" loading="lazy"
                                                                 src="{{ asset(intervention('500x376', $new->pageimg3, 'objects')) }}"
                                                                 alt="{{$new->title}}"></a>

                                    @endif
                                </div>
                            @endif

                            <div class="@if($new->pageimg3) page_r__right @endif">
                                <div class="page_page__desc1 desc pad_b33">
                                    {!! $new->text3 !!}
                                </div>
                            </div>

                        </div>
                    @endif


                    @if($new->text4)
                        <hr class="p_hr">
                        <div class="block page_l2">
                            <div class="page_page__desc2 desc">
                                {!! $new->text4 !!}
                            </div>
                        </div>
                    @endif

                    @if($new->pageimg4)
                        <div class="block pad_t26  pad_b20 ">
                            <a href="{{ asset(Storage::disk('public')->url($new->pageimg4)) }}" data-fancybox=""><img
                                    class="pc_category_img" style="width: 100%; height: auto" loading="lazy"
                                    src="{{ asset(Storage::disk('public')->url($new->pageimg4)) }}"
                                    alt="{{$new->title}}"></a>
                        </div>
                    @endif

            </div>

            @include('pages.catalog.object.partial._object_menu__js')

        </div>
    </main>

@endsection





