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

            <div class="ob_main_pageHtml ob_main_page block block_1123 ">
                <div class="block">
                    <div class="page_l">
                        <div class="page_l__left">
                            @if($item->main_title)
                                <h2 class="_h2">
                                    {{ $item->main_title  }}
                                </h2>
                            @endif
                            <div class="desc desc_main__content">
                                {!! $item->main_desc !!}
                            </div>

                        </div>
                        <div class="page_l__right">

                            @if($item->main_right_img )
                                <div class="desc desc_main__imgR pad_t33">
                                    <a href="{{ route('page.object.about', ['religion_slug'=> $religion->slug ,'object_slug'=> $item->slug  ] ) }}"><img class="pc_category_img" width="228" height="270" loading="lazy"
                                         src="{{ asset(intervention('228x270', $item->main_right_img, 'objects')) }}"
                                                    alt="{{$item->main_right_img}}"></a>
                                </div>
                                @if($item->main_right_img_text )
                                    <div class="desc desc_main__signature_img">
                                        {!! $item->main_right_img_text !!}
                                    </div>
                                @endif
                            @endif


                        </div>
                    </div>


                    @if($item->a_img )
                        <div class="page_l page_l__revers no_back">

                            <div class="page_l__left">
                                @if($item->a_img )
                                    <div class="desc desc_main__imgR pad_t1">
                                        <img class="pc_category_img" width="228" height="270" loading="lazy"
                                             src="{{ asset(intervention('228x270', $item->a_img, 'objects')) }}"
                                             alt="{{$item->a_img}}">
                                    </div>
                                @endif
                            </div>

                            <div class="page_l__right">
                                <div class="desc desc_main__content pad_t16">
                                    {!! $item->a_desc !!}
                                </div>
                            </div>

                        </div>
                    @endif

                    @if($item->a_desc2)
                        <div class="desc a_desc2 pad_t20">{!! $item->a_desc2 !!}</div>
                    @endif

                    @if($item->a_img2)
                        <div class="desc a_desc2 pad_t26">
                            <img class="pc_category_img" width="100%" style="width: 100%; height: auto" loading="lazy"
                                                                     src="{{ asset(Storage::disk('public')->url($item->a_img2)) }}"
                                                                     alt="photo" />
                        </div>
                    @endif

                    @if($item->a_img3)
                    <div class="page_l pad_t26_important no_back">

                        <div class="page_l__left">
                            <div class="desc desc_main__content">
                                {!! $item->a_desc3 !!}
                            </div>
                        </div>

                        <div class="page_l__right">
                            @if($item->main_right_img )
                                <div class="desc desc_main__imgR pad_t33">
                                    <img class="pc_category_img" width="228" height="270" loading="lazy"
                                         src="{{ asset(intervention('228x270', $item->a_img3, 'objects')) }}"
                                         alt="{{$item->a_img3}}">
                                </div>
                            @endif
                        </div>

                    </div>
                    @endif

                    @if($item->a_desc4)
                        <div class="desc a_desc2 pad_t26">{!! $item->a_desc4 !!}</div>
                    @endif

                    @if($item->a_img3)
                        <div class="desc a_desc2 pad_t26">
                            <img class="pc_category_img" width="100%" style="width: 100%; height: auto" loading="lazy"
                                 src="{{ asset(Storage::disk('public')->url($item->a_img3)) }}"
                                 alt="photo" />
                        </div>
                    @endif


                </div>

            </div>


            @include('pages.catalog.object.partial._object_menu__js')

        </div>
    </main>
@endsection


