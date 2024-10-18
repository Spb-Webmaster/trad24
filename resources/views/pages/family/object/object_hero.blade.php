@extends('layouts.layout')
<x-seo.meta
    title="{{($item->title)? 'Культурное наследие | Герои ' . $item->title :null}}"
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

                    @if(isset($item->family_hero))
                        <div class="h_contant">

                            <div class="h_contant__left">
                                <h2 class="_h2">
                                    {{__('Герои') }}
                                </h2>

                                <div class="__left_bar">
                                    <ul>
                                        @foreach($item->family_hero as $hero)
                                            @if($hero->published)

                                            <li>
                                                <a  {{($hero->url)?'target=_blank':''}} href="{{ ($hero->url)?: route('family_hero', ['family_slug' => $item->slug, 'slug' => $hero->slug]) }}">{{ $hero->title }}</a>
                                            </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>


                            </div>

                            <div class="h_contant__right">

                                <div class="@if($item->h_img) page_l @endif">

                                    <div class="@if($item->h_img) page_l__left @endif">
                                        @if($item->h_title)
                                            <h1 class="_h2">
                                                {{ $item->h_title  }}
                                            </h1>
                                        @endif
                                        <div class="desc desc_main__content">
                                            {!! $item->h_text !!}
                                        </div>

                                    </div>
                                    @if($item->h_img )
                                        <div class="page_l__right">

                                            @if($item->h_img )
                                                <div class="desc desc_main__imgR pad_t33">
                                                    <img class="pc_category_img" width="155" height="184" loading="lazy"
                                                         src="{{ asset(intervention('155x184', $item->h_img, 'objects')) }}"
                                                         alt="{{$item->h_img}}">
                                                </div>

                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div><!--.h_contant__right-->
                        </div><!--.h_contant-->
                    @else
                        <div class="page_l">
                            <div class="page_l__left">
                                @if($item->h_title)
                                    <h1 class="_h2">
                                        {{ $item->h_title  }}
                                    </h1>
                                @endif
                                <div class="desc desc_main__content">
                                    {!! $item->h_text !!}
                                </div>

                            </div>
                            <div class="page_l__right">

                                @if($item->h_img )
                                    <div class="desc desc_main__imgR pad_t33">
                                        <img class="pc_category_img" width="228" height="270" loading="lazy"
                                             src="{{ asset(intervention('228x270', $item->h_img, 'objects')) }}"
                                             alt="{{$item->h_img}}">
                                    </div>

                                @endif


                            </div>
                        </div>
                    @endif




                    @if($item->h_text2)
                        <div class="block page_l2 pad_t20">
                            <div class="page_page__desc2 desc">
                                {!! $item->h_text2 !!}
                            </div>
                        </div>
                    @endif

                    @if($item->h_img2)
                        <div class="block pad_t26  pad_b20 ">
                            <a href="{{ asset(Storage::disk('public')->url($item->h_img2)) }}" data-fancybox=""><img
                                    class="pc_category_img" style="width: 100%; height: auto" loading="lazy"
                                    src="{{ asset(Storage::disk('public')->url($item->h_img2)) }}"></a>
                        </div>
                    @endif

                    @if($item->h_text3)
                        <div class="block    @if($item->h_img3) page_r @endif">
                            @if($item->h_img3)
                                <div class="page_r__left">

                                    @if($item->h_img3)
                                        <a href="{{ asset(Storage::disk('public')->url($item->h_img3)) }}"
                                           data-fancybox=""><img class="pc_category_img" width="500" height="376"
                                                                 loading="lazy"
                                                                 src="{{ asset(intervention('500x376', $item->h_img3, 'objects')) }}"></a>

                                    @endif
                                </div>
                            @endif

                            <div class="@if($item->h_img3) page_r__right @endif">
                                <div class="page_page__desc1 desc pad_b33">
                                    {!! $item->h_text3 !!}
                                </div>
                            </div>

                        </div>
                    @endif

                    @if($item->h_text4)
                        <hr class="p_hr">
                        <div class="block page_l2">
                            <div class="page_page__desc2 desc">
                                {!! $item->h_text4 !!}
                            </div>
                        </div>
                    @endif

                    @if($item->h_img4)
                        <div class="block pad_t26  pad_b20 ">
                            <a href="{{ asset(Storage::disk('public')->url($item->h_img4)) }}" data-fancybox=""><img
                                    class="pc_category_img" style="width: 100%; height: auto" loading="lazy"
                                    src="{{ asset(Storage::disk('public')->url($item->h_img4)) }}"
                                ></a>
                        </div>
                    @endif


                </div>

            </div>


            @include('pages.family.object.partial._object_menu__js')

        </div>
    </main>
@endsection





