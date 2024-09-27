@extends('layouts.layout')
<x-seo.meta
    title="{{($item->title)? 'Выдающиеся люди | ' . $item->title :null}}"
    description="{{($item->description)?:null}}"
    keywords="{{($item->keywords)?:null}}"
/>
@section('content')
    <section class="good_summer"></section>
    <main>
        <div class="page_object">

            @include('pages.family.object.partial._object_breadcrumbs')

            @include('pages.family.object.partial._object_title')

            @include('pages.family.object.partial._object_logo')

            @include('include.menu.object_menu')


            <div class="ob_main_pageHtml ob_main_page block block_1123 ">
                <div class="block">
                    <div class="page_l">
                        <div class="page_l__left">
                            @if($item->p_title)
                                <h2 class="_h2">
                                    {{ $item->p_title  }}
                                </h2>
                            @endif
                            <div class="desc desc_main__content">
                                {!! $item->p_text !!}
                            </div>

                        </div>
                        <div class="page_l__right">

                            @if($item->p_img )
                                <div class="desc desc_main__imgR pad_t33">
                                    <a href=""><img class="pc_category_img" width="228" height="270" loading="lazy"
                                                    src="{{ asset(intervention('228x270', $item->p_img, 'objects')) }}"
                                                    alt="{{$item->p_img}}"></a>
                                </div>

                            @endif


                        </div>
                    </div>


                    @if($item->p_text2)
                        <div class="block page_l2 pad_t20">
                            <div class="page_page__desc2 desc">
                                {!! $item->p_text2 !!}
                            </div>
                        </div>
                    @endif

                    @if($item->p_img2)
                        <div class="block pad_t26  pad_b20 ">
                            <a href="{{ asset(Storage::disk('public')->url($item->p_img2)) }}" data-fancybox=""><img
                                    class="pc_category_img" style="width: 100%; height: auto" loading="lazy"
                                    src="{{ asset(Storage::disk('public')->url($item->p_img2)) }}"></a>
                        </div>
                    @endif

                    @if($item->p_text3)
                        <div class="block    @if($item->p_img3) page_r @endif">
                            @if($item->p_img3)
                                <div class="page_r__left">

                                    @if($item->p_img3)
                                        <a href="{{ asset(Storage::disk('public')->url($item->p_img3)) }}"
                                           data-fancybox=""><img class="pc_category_img" width="500" height="376" loading="lazy"
                                                                 src="{{ asset(intervention('500x376', $item->p_img3, 'objects')) }}"></a>

                                    @endif
                                </div>
                            @endif

                            <div class="@if($item->p_img3) page_r__right @endif">
                                <div class="page_page__desc1 desc pad_b33">
                                    {!! $item->p_text3 !!}
                                </div>
                            </div>

                        </div>
                    @endif

                    @if($item->p_text4)
                        <hr class="p_hr">
                        <div class="block page_l2">
                            <div class="page_page__desc2 desc">
                                {!! $item->p_text4 !!}
                            </div>
                        </div>
                    @endif

                    @if($item->p_img4)
                        <div class="block pad_t26  pad_b20 ">
                            <a href="{{ asset(Storage::disk('public')->url($item->p_img4)) }}" data-fancybox=""><img
                                    class="pc_category_img" style="width: 100%; height: auto" loading="lazy"
                                    src="{{ asset(Storage::disk('public')->url($item->p_img4)) }}"
                                ></a>
                        </div>
                    @endif

                </div>

            </div>


            @include('pages.family.object.partial._object_menu__js')

        </div>
    </main>
@endsection




