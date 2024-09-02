    <x-forms.formsubmit
    name="religion"
    action="{{route('form.submit.religion')}}"
    >
        <input type="hidden" name="religion" class="f_religion__js" value="{{ $religion->id }}">

    </x-forms.formsubmit>
    <div class="axeld_select__js religion_select__flex _rel__js">
        <div class="_h1 color_green _lefttext"><span>{{__('Направление:')}}</span></div>
        <div class="religion_select__axeld _righttext">
            <div class="font_30 s_active s__js" data-religion="{{ $religion->id }}"><span>{{ $religion->title }}</span></div>
            <div class="s_box">

                @foreach($religions as $r)
                    <div class="s_box__rel s_rel__js  @if($r->id == $religion->id) active @endif">
                        <span data-religion="{{ $r->id  }}">{{ $r->title  }}</span>
                    </div>
                @endforeach

            </div>

        </div>
    </div>


