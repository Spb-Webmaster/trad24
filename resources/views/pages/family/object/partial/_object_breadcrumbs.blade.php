<div class="breadcrumbs_object block">
    <div class="breadcrumbs_object__flex breadcrumbs_ul">
        <div class="breadcrumbs_li">
            <a href="{{route('home')}}"><span>{{__('Главная')}}</span></a>
        </div>
        <div class="breadcrumbs_drob">/</div>

        <div class="breadcrumbs_li">
            <a href="{{ route('religion', $religion->slug) }}"><span>{{ $religion->title }}</span></a>
        </div>
        <div class="breadcrumbs_drob">/</div>

        <div class="breadcrumbs_li">
            <a href="{{ route('religion.area.list', ['slug' => $religion->slug , 'id' => $selected_area->id ]) }}"><span>{{ $selected_area->title  }}</span></a>
        </div>
        <div class="breadcrumbs_drob">/</div>

        <div class="breadcrumbs_li">
            <a href="{{ route('religion.area.category.list', ['religion_slug' => $religion->slug , 'area_id' => $selected_area->id, 'religion_gategory_slug' => $selected_religion_category->slug ], ) }}"><span>{{ $selected_religion_category->title  }}</span></a>
        </div>

    </div>

</div>

