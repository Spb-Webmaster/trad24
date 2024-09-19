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

            <div class="ob_main_pageHtml ob_main_contact block block_850">
              <div class="block">
                @if($item->contact_title)
                    <h2 class="_h2" align="center">
                        {{ $item->contact_title  }}
                    </h2>
                @else
                    <h2 class="_h2" align="center">
                        {{ __('Контакты') }}
                    </h2>
                @endif

                <div class="ob_main_contact__flex">
                    <div class="ob_main_contact__left">
                        <div class="ob_main_contact__address">
                            <div class="ob_main_contact__label">{{ __('Адрес:') }}</div>
                            <div class="ob_main_contact__value">{{($item->contact_address)?:'-'}}</div>
                        </div>

                    </div>
                    <div class="ob_main_contact__right">


                        <div class="ob_main_contact__phone">
                            <div class="ob_main_contact__label">{{ __('Телефон:') }}</div>
                            @if($item->contact_phone1)
                                <div class="ob_main_contact__value">{{$item->contact_phone1}}</div>
                            @endif
                            @if($item->contact_phone2)
                                <div class="ob_main_contact__value">{{$item->contact_phone2}}</div>
                            @endif
                            @if($item->contact_phone3)
                                <div class="ob_main_contact__value">{{$item->contact_phone3}}</div>
                            @endif
                            @if($item->contact_phone1 or $item->contact_phone2 or $item->contact_phone3)
                            @else
                                <div class="ob_main_contact__value">{{__('Не указано')}}</div>
                            @endif

                        </div>
                        <div class="ob_main_contact__email">
                            <div class="ob_main_contact__label">{{ __('Email:') }}</div>
                            @if($item->contact_email)
                                <div class="ob_main_contact__value">{{$item->contact_email}}</div>
                            @else
                                <div class="ob_main_contact__value">{{__('Не указано')}}</div>
                            @endif
                        </div>

                    </div>

                </div>
                @if($item->contact_desc)
                    <div class="desc ob_main_contact__additionally">
                        <div class="ob_main_contact__content">{!!  $item->contact_desc!!}</div>
                    </div>
                @endif


            </div>
            </div>

            @include('pages.catalog.object.partial._object_menu__js')

            <div class="JFormFieldMap_wrapper">
                <div id="loader_wrapper" class="loader_wrapper active ">
                    <x-forms.loader class="br_12 active"/>
                </div>
                <div id="JFormFieldMap" class="JFormFieldMap" style="width: 100%; height: 550px"></div>
            </div>
        </div>
    </main>
    @if($item->contact_yandex_map)
        <script>
            function getYaMap() {

                var myMap = new ymaps.Map("JFormFieldMap", {
                    center: [{{$item->contact_yandex_map}}],
                    zoom: 16,
                    controls: ['zoomControl', 'typeSelector', 'fullscreenControl']
                }, {searchControlProvider: 'yandex#search'});
                myPlacemark = new ymaps.Placemark([{{$item->contact_yandex_map}}], {balloonContent: '<h5>  {{$item->title}}</h5>'}, {
                    iconLayout: 'default#image',
                    iconImageHref: '{{ asset('/storage/images/myIcon_green.png') }}',
                    iconImageSize: [58, 55],
                    iconImageOffset: [-28, -48]
                });

               // myMap.setType(`yandex#hybrid`);
                myMap.geoObjects.add(myPlacemark);
            }

            // меняем тип карты на hybrid

        </script>
    @endif
@endsection


