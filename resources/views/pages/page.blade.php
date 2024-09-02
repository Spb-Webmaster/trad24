@extends('layouts.layout')
<x-seo.meta
    title="{{(isset($page->metatitle)) ? $page->metatitle : $page->title}}"
    description="{{($page->description)?:null}}"
    keywords="{{($page->keywords)?:null}}"
/>
@section('content')
    <main>
        <div class="page_page">
            <div class="block pad_t20">
                <div class="ob_title">
                    <h1 class="h1_title">{{ $page->title }}</h1>
                    @if($page->subtitle)
                        <span class="ob_subtitle">{{ $page->subtitle }}</span>
                    @endif
                </div>
            </div>


            @if($page->text)
                <div class="block    @if($page->pageimg1) page_l @endif">
                    <div class="@if($page->pageimg1) page_l__left @endif">
                        <div class="page_page__desc1 desc">
                            {!! $page->text !!}
                        </div>
                    </div>
                    @if($page->pageimg1)
                        <div class="page_l__right">

                            @if($page->pageimg1)
                                <div class="desc desc_main__imgR pad_t33 pad_b33">
                                    <img class="pc_category_img" width="228" height="270" loading="lazy"
                                         src="{{ asset(intervention('228x270', $page->pageimg1, 'objects')) }}"
                                         alt="{{$page->title}}">

                                </div>

                            @endif
                        </div>
                    @endif

                </div>
                <hr class="p_hr">

            @endif

            @if($page->text2)
                <div class="block page_l2 pad_t20">
                    <div class="page_page__desc2 desc">
                        {!! $page->text2 !!}
                    </div>
                </div>
            @endif

            @if($page->pageimg2)
                <div class="block pad_t26  pad_b20 ">
                    <a href="{{ asset(Storage::disk('public')->url($page->pageimg2)) }}" data-fancybox=""><img
                            class="pc_category_img" style="width: 100%; height: auto" loading="lazy"
                            src="{{ asset(Storage::disk('public')->url($page->pageimg2)) }}"
                            alt="{{$page->title}}"></a>
                </div>
            @endif

            @if($page->text3)
                <div class="block    @if($page->pageimg3) page_r @endif">
                    @if($page->pageimg3)
                        <div class="page_r__left">

                            @if($page->pageimg3)
                                <a href="{{ asset(Storage::disk('public')->url($page->pageimg3)) }}"
                                   data-fancybox=""><img class="pc_category_img" width="500" height="376" loading="lazy"
                                                         src="{{ asset(intervention('500x376', $page->pageimg3, 'objects')) }}"
                                                         alt="{{$page->title}}"></a>

                            @endif
                        </div>
                    @endif

                    <div class="@if($page->pageimg3) page_r__right @endif">
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

            @if($page->pageimg4)
                <div class="block pad_t26  pad_b20 ">
                    <a href="{{ asset(Storage::disk('public')->url($page->pageimg4)) }}" data-fancybox=""><img
                            class="pc_category_img" style="width: 100%; height: auto" loading="lazy"
                            src="{{ asset(Storage::disk('public')->url($page->pageimg4)) }}"
                            alt="{{$page->title}}"></a>
                </div>
            @endif

            @if($page->gallery_visible)


                <div class="block ob_gallery pad_t26  pad_b20 ">

                    @foreach($page->gallery as $g)
                        <div class="mItem">
                            <a href="{{ asset(Storage::disk('public')->url($g['gallery_img'])) }}"
                               data-fancybox="gallery"><img class="pc_category_img" style="width: 290px; height: auto"
                                                            loading="lazy"
                                                            src="{{ asset(Storage::disk('public')->url($g['gallery_img'])) }}"
                                                            alt="{{($page->gallery_img_title)??''}}"></a></div>
                    @endforeach

                </div>
            @endif

            @if($page->video_visible)


                <div class="block">
                    <hr class="p_hr">
                    <div class="ob_video">
                        @if($page->video)
                            @foreach($page->video as $v)

                                <div class="ob_controls">
                                    @if($v['video_video_title'])
                                        <div class="desc ">
                                            <h4 class="pad_b26_important">{{$v['video_video_title']}}</h4>
                                        </div>
                                    @endif
                                        @if($v['video_video_video'])

                                            <video controls width="840" height="473"  @if($page->above) poster="{{ asset(intervention('840x4473', $page->img, 'videos')) }}" @endif>
                                                <source src="{{ asset('/storage/' .$v['video_video_video'])  }}"
                                                        type="video/mp4">
                                            </video>
                                        @endif

                                        @if($v['video_video_youtube'])
                                            {!!   youtube($v['video_video_youtube'], 840,473) !!}
                                        @endif


                                        <div class="video_video_desc desc">
                                            @if($v['video_video_desc'])
                                                {!! $v['video_video_desc'] !!}
                                            @endif
                                        </div>
                                </div>

                            @endforeach
                        @endif
                    </div>
                </div>
            @endif


        </div><!--.page_page-->
    </main>
@endsection





