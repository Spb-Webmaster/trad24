{{--$item - модель от передающего файла--}}
{{--$model - модель от передающего файла--}}
{{--$prefix - модель от передающего файла--}}
@props([
   'model' => '',
   'item' => '',
   'prefix' => '',
   'article_id' => 0,
])

<div class="_articles_options">
    <div class="_art_m _articles_options__more">
            <span class="eye">
              <x-dashboard.icons.eye/>
            </span>
        <span>{!!   $item->viewer !!}</span>
    </div>
    <div class="_art_m _articles_options__date_create">
            <span class="calendar">
              <x-dashboard.icons.calendar/>
            </span>
        <span>{{rusdate3($item->created_at)}}</span>
    </div>

    @if($model)
        <div class="_art_m _articles_options__more">
            <span class="chat1">
              <x-dashboard.icons.chat1/>
            </span>
            <span>
            @livewire('comments.comment-option', ['article_id' => $item->id, 'model' => $model, 'prefix'=> $prefix ])
        </span>
        </div>

    @endif

</div>

