@extends('layouts.layout')
@section('title', ($seo_title)??null)
@section('description', ($seo_description)??null)
@section('keywords', ($seo_keywords)??null)
@section('content')
    <section class="good_summer good_summer__home"></section>
    <main>
        <div class="bbb" style="max-width: 600px; margin: 50px auto; position: relative; z-index: 1000">
            <div class="calendarEvents__js" data-events="[[10,22,2024],[05,24,2024],[11,9,2024]]"></div>
            <div class="calendarHref__js" data-link='["https://stackoverflow.com", "https://google.com"]'></div>
            <div class="calendarHtml__js" data-html='["stackoverflow", "google.com"]'></div>
            <div id="datepicker1"></div>
            <input type="hidden" id="datepicker_value" value="01.08.2019">
            <div class="datepicker_display display_none"></div>
        </div>

    </main>
@endsection

[[05,31,2024],[04,10,2024],[03,15,2024],[11,9,2024]]
[[10,22,2024],[10,24,2024],[11,9,2024]]
