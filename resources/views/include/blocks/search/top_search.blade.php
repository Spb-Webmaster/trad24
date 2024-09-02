<div class="t_search _search">
    <x-forms.form
        title=""
        subtitle=""
        action="{{ route('form.search.top_search') }}"
        method="POST"
    >
        <div class="slotButtons slotButtons__right slotButtons__lupa">
            <div class=" text_input">
                <x-forms.primary-button>
                </x-forms.primary-button>
            </div>
        </div>
        <div class="text_input">
            <x-forms.text-input-search
                type="text"
                id="searchSearch"
                name="top_search"
                placeholder="Поиск по организациям"
                value=""
                class="input search"
             {{-- // можно добавить - будет посветка autocomplete-ajax--}}
                required="true"
                :isError="$errors->has('top_search')"
            />
            <x-forms.error class="error_top_search"/>

        </div>

    </x-forms.form>

</div>
