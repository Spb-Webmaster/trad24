@extends('layouts.layout')
<x-seo.meta
    title="{{($item->title)? 'Благотворительность |  ' . $item->title :null}}"
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
                            @if($item->b_title)
                                <h2 class="_h2">
                                    {{ $item->b_title  }}
                                </h2>
                            @endif
                            <div class="desc desc_main__content">
                                {!! $item->b_text !!}
                            </div>

                        </div>
                        <div class="page_l__right">

                            @if($item->b_img )
                                <div class="desc desc_main__imgR pad_t33">
                                    <a href=""><img class="pc_category_img" width="228" height="270" loading="lazy"
                                                    src="{{ asset(intervention('228x270', $item->b_img, 'objects')) }}"
                                                    alt="{{$item->b_img}}"></a>
                                </div>

                            @endif


                        </div>
                    </div>

                </div>

            </div>


            @include('pages.family.object.partial._object_menu__js')

        </div>
    </main>
@endsection



