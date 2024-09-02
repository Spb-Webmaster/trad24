@extends('layouts.layout')
<x-seo.meta
title="{{($religion->title)?:null}}"
description="{{($religion->description)?:null}}"
keywords="{{($religion->keywords)?:null}}"
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

    </main>
@endsection

