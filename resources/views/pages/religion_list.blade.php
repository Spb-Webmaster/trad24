@extends('layouts.layout')
<x-seo.meta
    title="{{__('Религии')}}"
    description=""
    keywords=""
/>
@section('content')
    <main>
        <div class="page_page">

            @include('include.blocks.religions.religions_index')


        </div><!--.page_page-->
    </main>
@endsection





