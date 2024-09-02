<div class="big_search" id="big_search__js">
    <div class="block block_1147">
        <div class="big_search__wrap">
            <div class="big_search__box">
                <x-forms.form
                    name="big_search"
                    action="{{route('form.search.big_search')}}">
                    <div class="slotButtons slotButtons__right slotButtons__lupa">
                        <div>
                            <x-forms.primary-button>
                            </x-forms.primary-button>
                        </div>
                    </div>
                    <div class="text_big_search">
                        <x-forms.text-input-bigsearch
                            id="big_search"
                            class="autocomplete-ajax"
                            name="top_search"
                            placeholder="Поиск по организациям. Введите название."
                            type="text"
                            :isError="$errors->has('top_search')"
                        />
                        <x-forms.error class="error_big_search"/>
                    </div>
                    <input type="hidden" value="" name="object" class="ui_object" />
                    <input type="hidden" value="" name="area" class="ui_area"  />
                    <input type="hidden" value="" name="religion" class="ui_religion"  />
                </x-forms.form>
            </div>
        </div>
    </div>
</div>
