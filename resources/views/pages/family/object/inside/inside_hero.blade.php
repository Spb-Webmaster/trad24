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
                                        <li class="{{ active_linkMenu(asset(route('family_hero', ['family_slug' => $item->slug, 'slug' => $hero->slug])), 'find') }}">
                                            <a  {{($hero->url)?'target=_blank':''}} class="{{ active_linkMenu(asset(route('family_hero', ['family_slug' => $item->slug, 'slug' => $hero->slug])), 'find') }}"
                                               href="{{($hero->url)?: route('family_hero', ['family_slug' => $item->slug, 'slug' => $hero->slug]) }}">{{ $hero->title }}</a>
                                        </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--.h_contant__left-->

                        <div class="h_contant__right">


                            @if($page->text)
                                <div class="block  pad_t26_important  @if($page->img) page_l @endif">

                                    <div class="@if($page->img) page_l__left @endif">
                                        @if($page->title)
                                            <h1 class="_h2">
                                                {{ $page->title  }}
                                            </h1>
                                        @endif

                                        <div class="page_page__desc1 desc">
                                            {!! $page->text !!}
                                        </div>
                                    </div>

                                    @if($page->img)
                                        <div class="page_l__right">

                                            @if($page->img)
                                                <div class="desc desc_main__imgR pad_t33 pad_b33">
                                                    <img class="pc_category_img" width="155" height="184" loading="lazy"
                                                         src="{{ asset(intervention('155x184', $page->img, 'objects')) }}"
                                                         alt="{{$page->title}}">
                                                </div>

                                            @endif
                                        </div>
                                    @endif

                                </div>

                            @endif

                        </div><!--.h_contant__right-->
                    </div><!--.h_contant-->
                @else

                    @if($page->title)
                        <h1 class="_h2" align="center">
                            {{ $page->title  }}
                        </h1>
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

                @if($page->text3)
                    <div class="block    @if($page->img3) page_r @endif">
                        @if($page->img3)
                            <div class="page_r__left">

                                @if($page->img3)
                                    <a href="{{ asset(Storage::disk('public')->url($page->img3)) }}"
                                       data-fancybox=""><img class="pc_category_img" width="500" height="376"
                                                             loading="lazy"
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


                @if($page->text4)
                    <hr class="p_hr">
                    <div class="block page_l2">
                        <div class="page_page__desc2 desc">
                            {!! $page->text4 !!}
                        </div>
                    </div>
                @endif

                @if($page->img4)
                    <div class="block pad_t26  pad_b20 ">
                        <a href="{{ asset(Storage::disk('public')->url($page->img4)) }}" data-fancybox=""><img
                                class="pc_category_img" style="width: 100%; height: auto" loading="lazy"
                                src="{{ asset(Storage::disk('public')->url($page->img4)) }}"
                                alt="{{$page->title}}"></a>
                    </div>
                @endif

            </div>

            @include('pages.family.object.partial._object_menu__js',   ['active' => $page->id])

            @if($page->css)
                <style>
                    {!! $page->css !!}
                </style>
            @endif

        </div>
    </main>

@endsection





