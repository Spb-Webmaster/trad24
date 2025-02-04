<div class="livewire_component__comment_answer comment_answer">
    {{-- Success is as dangerous as failure. --}}
    {{-- Care about people's approval and you will be their prisoner. --}}
    <form class="web_c web_c_flex" wire:submit="save" >

        <div class="web_c_answer_left web_c_textarea">
            <div class="c__flex_100">
                <div class="text_input textarea_input pad_t0_important">
                    <textarea id="c_com_{{$comment_id}}" wire:model="text" class="@error('text') _is-error @enderror inputClass input text">{!!  old('text')!!}</textarea><label class="labelInput" for="c_com_{{$comment_id}}">Комментарий</label>
                    @error('text')
                    <div class="error_comment">
                        <div class="errorBlade ">{{ $message }} </div>
                    </div>
                    @enderror
                    <input type="hidden" wire:model="article_id"/>
                    <input type="hidden" wire:model="comment_id"/>
                </div>


            </div>
        </div>

        <div class="web_c_answer_right web_c_send">
            <button type="submit" class="paper">
                <x-dashboard.icons.paper/>
            </button>

        </div>


    </form>
</div>
