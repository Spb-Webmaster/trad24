    <x-forms.formsubmit
    name="religion_category"
    action="{{route('form.submit.religion_category')}}"
    >
        <input type="hidden" name="religion_category" class="f_religion_category__js" value="0">
        <input type="hidden" name="area" class="f_arae__js" value="@if($selected_area){{ $selected_area->id }}@endif">

    </x-forms.formsubmit>
    <div class="axeld_select__js religion_select__flex _rel_cat _rel_cat__js">
        <div class="_h1 color_green _lefttext"><span>{{__('Вид объекта:')}}</span></div>
        <div class="religion_select__axeld _righttext">
            <div class="font_30 s_active s__js" data-religion_category=""><span>{{ (isset($selected_religion_category->title))? $selected_religion_category->title:  __('Выбрать') }}</span></div>
            <div class="s_box">
                @foreach($religion_categories as $r)
                    <div class="s_box__rel s_relob__js  @if($r->id == $religion->id) active @endif">
                        <span data-religion_category="{{ $r->id  }}">{{ $r->title  }}</span>
                    </div>
                @endforeach

            </div>

        </div>
    </div>


