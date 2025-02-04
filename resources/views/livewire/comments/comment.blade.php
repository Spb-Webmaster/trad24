<div class="livewire_component__comment">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <form class="web_c web_c_flex" wire:submit="save" >
        <div class="web_c__left web_c_avatar">
            @if(isset($user->avatar))


                    <div class="site_avatar"
                         style="cursor: auto ;background-image: url('@if($user->avatar){{  asset(intervention('120x120', $user->avatar, 'users/' . $user->id  . '/avatar')) }} @endif '); width: 70px; height: 70px"></div>

            @else
                <div class="site_avatar"
                     style="background-image: url('{!! 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCAwQzguMDU5NSAwIDAgOC4wNTk1IDAgMThDMCAyNy45NDA1IDguMDU5NSAzNiAxOCAzNkMyNy45NDA1IDM2IDM2IDI3Ljk0MDUgMzYgMThDMzYgOC4wNTk1IDI3Ljk0MDUgMCAxOCAwWk0xOCA3LjUwMDA3QzIxLjcyMTUgNy41MDAwNyAyNC43NSAxMC41Mjg2IDI0Ljc1IDE0LjI1MDFDMjQuNzUgMTcuOTcxNiAyMS43MjE1IDIxLjAwMDEgMTggMjEuMDAwMUMxNC4yNzg1IDIxLjAwMDEgMTEuMjUgMTcuOTcxNiAxMS4yNSAxNC4yNTAxQzExLjI1IDEwLjUyODYgMTQuMjc4NSA3LjUwMDA3IDE4IDcuNTAwMDdaTTcuOTQ1NTEgMjkuMDk4NEMxMC42MDk1IDMxLjUxNDkgMTQuMTMgMzIuOTk5OSAxOCAzMi45OTk5QzIxLjg3IDMyLjk5OTkgMjUuMzkwNSAzMS41MTQ5IDI4LjA1NDUgMjkuMDk4NEMyNi43ODU1IDI2LjE2MTQgMjIuNzc2IDIzLjk5OTkgMTggMjMuOTk5OUMxMy4yMjQgMjMuOTk5OSA5LjIxNDUxIDI2LjE2MTQgNy45NDU1MSAyOS4wOTg0WiIgZmlsbD0iI0UwRTBFMCIvPgo8L3N2Zz4K' !!}'); width: 70px; height: 70px"></div>
            @endif
        </div>

        <div class="web_c__center web_c_textarea">
            <div class="c__flex_100">
                <div class="text_input textarea_input pad_t0_important">
                    <textarea id="c_com" wire:model="text" class="@error('text') _is-error @enderror inputClass input text">{!!  old('text')!!}</textarea><label class="labelInput" for="c_com">Комментарий</label>
                    @error('text')
                    <div class="error_comment">
                    <div class="errorBlade ">{{ $message }} </div>
                    </div>
                    @enderror
                    <input type="hidden" wire:model="user_id"/>
                    <input type="hidden" wire:model="article_id"/>
                </div>


            </div>
        </div>

        <div class="web_c__right web_c_send">
            <button type="submit" class="paper">
                <x-dashboard.icons.paper/>
            </button>

        </div>


    </form>
</div>
