@extends('layouts.layout')
<x-seo.meta
    title="{{$religion->title . ' | ' .$selected_area->title . ' | ' . env('APP_NAME')}}"
    description=""
    keywords=""
/>
@section('content')
    <section class="good_summer"></section>
    <main>
        <div class="r_filter z-index_100">
            <div class="r_filter__b"></div>
            <div class="block block_1147">
                <div class="r_filter__flex">
                    <div class="r_filter__left">
                        @include('include.blocks.religions.religion_select')
                    </div>
                    <div class="r_filter__right">
                        @include('include.blocks.region.region_select')

                    </div>
                </div>
            </div>
        </div>

        <div class="r_filter z-index_90">
            <div class="block block_1147">
                <div class="r_filter__flex r_filter__flex_nopadding">
                    <div class="r_filter__left">
                        @include('include.blocks.religions.religioncategory_select')
                    </div>
                    <div class="r_filter__right">
                    </div>
                </div>
            </div>
        </div>

   @include('include.blocks.search.big_search')

   @include('include.blocks.content.teaser.teaser_4')



    </main>
@endsection



