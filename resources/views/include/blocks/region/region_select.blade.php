<div class="f_region ">
    <div class="f_region__flex f_region__js">
        <div class="f_icon__region"></div>
        @if(isset($selected_area))
        <div class="font_30 ellipsis_500"><span>{{ $selected_area->title}}</span></div>
        @else
        <div class="font_30"><span>{{ __('Выберете регион') }}</span></div>
        @endif
    </div>
    <div class="chosen_area__wrap chosen__js">

        <div class="chosen_area__paralelogramm"></div>

        <div class="chosen_area_sel__wrap">
            <div id="chosen_area" class="chosen_area__js">
                <select name="area" class="js-chosen js-area-select select_area__js">
                    <option value="0"></option>

                    @foreach($areas as $area)
                        <option value="{{ $area->id  }}"
                        @if(isset($selected_area))
                            @if($selected_area->id == $area->id)
                                {{ 'selected' }}
                                @endif
                            @endif
                        >{{ $area->title  }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <x-forms.formsubmit
        name="area"
        action="{{route('form.submit.area')}}"
    >
        <input type="hidden" name="area" class="f_area__js" value="">
        <input type="hidden" name="religion" class="f_religion__js" value="{{ $religion->id }}">

    </x-forms.formsubmit>
</div>
