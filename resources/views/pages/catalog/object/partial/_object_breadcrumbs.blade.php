<div class="breadcrumbs_object block">
    <div class="breadcrumbs_object__flex breadcrumbs_ul">
        <div class="breadcrumbs_li">
            <a href="{{route('home')}}"><span>{{__('Главная')}}</span></a>
        </div>
        <div class="breadcrumbs_drob">/</div>

        <div class="breadcrumbs_li">
            <a href="{{ route('familyCategory') }}"><span>{{ __('Фамилии') }}</span></a>
        </div>
        <div class="breadcrumbs_drob">/</div>

        <div class="breadcrumbs_li">
            <a href="{{ route('family', ['slug' => $item->slug ]) }}"><span>{{ $item->title  }}</span></a>
        </div>

    </div>

</div>
