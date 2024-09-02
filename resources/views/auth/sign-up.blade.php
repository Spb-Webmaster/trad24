@extends('layouts.layout')
@section('title', ($seo_title) ?? __('Регистрация') )
@section('description', ($seo_description)?? __('Регистрация') )
@section('keywords', ($seo_keywords)?? __('Регистрация') )
@section('content')
    <div class="auth">

    <div class=" block">
        <div class="formLogin__padd">
            <div class="formLogin pageRegister">
                <div class="formLogin__wrapp">
                    <div class="formLogin__enter">
                <x-forms.auth-form
                    title="{{__('Регистрация') }}"
                    subtitle="{{__('Введите ваши личные данные') }}"
                    action="{{ route('register.handle') }}"
                    method="POST"
                >
                    <div class="text_input">
                    <x-forms.text-input
                        type="text"
                        id="registerName"
                        name="name"
                        placeholder="Имя"
                        value="{{ old('name') }}"
                        required="true"
                        :isError="$errors->has('name')"
                    />
                    @error('name')
                    <x-forms.error>
                        {{ $message }}
                    </x-forms.error>
                    @enderror
                    </div>

                    <div class="text_input">
                    <x-forms.text-input
                        type="email"
                        id="registerEmail"
                        name="email"
                        placeholder="E-mail"
                        required="true"
                        value="{{ old('email') }}"
                        :isError="$errors->has('email')"
                    />
                    @error('email')
                    <x-forms.error>
                        {{ $message }}
                    </x-forms.error>
                    @enderror
                    </div>

                    <div class="text_input">
                    <x-forms.text-input
                        type="password"
                        id="registerPassword"
                        name="password"
                        placeholder="Пароль мин.8 символов"
                        required="true"
                        :isError="$errors->has('password')"
                    />

                    @error('password')
                    <x-forms.error>
                        {{ $message }}
                    </x-forms.error>
                    @enderror
                    </div>

                    <div class="text_input">
                    <x-forms.text-input
                        type="password"
                        id="registerPassword_confirmation"
                        name="password_confirmation"
                        placeholder="Повторите пароль"
                        required="true"
                        :isError="$errors->has('email')"
                    />

                    @error('password_confirmation')
                    <x-forms.error>
                        {{ $message }}
                    </x-forms.error>
                    @enderror
                    </div>






                    <x-slot:buttons>
                        <div class="slotButtons">
                            <x-forms.primary-button>
                               {{ __('Зарегистрироваться') }}
                            </x-forms.primary-button>
                            <div class="slotButtons__security securityAuth">
                                <div class="securityAuth__left">
                                    <img alt="sec" width="16" height="16"  src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTcuNzYyODQgMTQuNjYzQzcuODY5OTggMTQuNjYzIDguMDM3MzggMTQuNjIyOCA4LjIwNDgxIDE0LjUzNTdDMTIuMDE1IDEyLjU0MDIgMTMuMjQwNSAxMS41NDI0IDEzLjI0MDUgOS4xMzg0MlY0LjA4OTNDMTMuMjQwNSAzLjM5OTU3IDEyLjk0NTggMy4xNzg1OSAxMi4zODM0IDIuOTQ0MjFDMTEuNTk5OSAyLjYyMjc4IDkuMDk1NDQgMS43MTIwNyA4LjMxODY0IDEuNDQ0MjFDOC4xMzc4NCAxLjM4Mzk1IDcuOTUwMzMgMS4zNTA0NiA3Ljc2Mjg0IDEuMzUwNDZDNy41NzUzMyAxLjM1MDQ2IDcuMzg3ODQgMS4zOTA2NCA3LjIxMzczIDEuNDQ0MjFDNi40MzAyNSAxLjY5ODY4IDMuOTI1NzggMi42Mjk0OCAzLjE0MjMgMi45NDQyMUMyLjU4NjUgMy4xNzE4OSAyLjI4NTE2IDMuMzk5NTcgMi4yODUxNiA0LjA4OTNWOS4xMzg0MkMyLjI4NTE2IDExLjU0MjQgMy41Nzc1NyAxMi40MjY0IDcuMzIwODcgMTQuNTM1N0M3LjQ5NDk4IDE0LjYyOTUgNy42NTU2OSAxNC42NjMgNy43NjI4NCAxNC42NjNaIiBmaWxsPSIjNTlCMTRBIi8+CjxwYXRoIGQ9Ik03LjAxMjg0IDExLjAyNjdDNi43ODUxNiAxMS4wMjY3IDYuNTk3NjYgMTAuOTM5NyA2LjQyMzU1IDEwLjcwNTNMNC43NDI3NSA4LjY0MjhDNC42NDIzIDguNTA4ODYgNC41ODIwMyA4LjM1NDg2IDQuNTgyMDMgOC4yMDc1NUM0LjU4MjAzIDcuODk5NDkgNC44MTY0MSA3LjY1MTcyIDUuMTI0NDQgNy42NTE3MkM1LjMxMTk1IDcuNjUxNzIgNS40NTkyNyA3LjcxODY5IDUuNjI2NjggNy45Mzk2Nkw2Ljk4NjA1IDkuNjk0MTJMOS44NDU0NCA1LjEwMDM5QzkuOTcyNjQgNC44OTI4IDEwLjE0NjggNC43OTIzNiAxMC4zMjc2IDQuNzkyMzZDMTAuNjE1NSA0Ljc5MjM2IDEwLjg5MDEgNC45OTMyNSAxMC44OTAxIDUuMzAxMjhDMTAuODkwMSA1LjQ1NTMxIDEwLjgwOTcgNS42MDkzMiAxMC43MjI2IDUuNzQzMjVMNy41NzUzMyAxMC43MDUzQzcuNDM0NzEgMTAuOTE5NiA3LjI0MDUyIDExLjAyNjcgNy4wMTI4NCAxMS4wMjY3WiIgZmlsbD0id2hpdGUiLz4KPC9zdmc+Cg==">

                                </div>
                                <div class="securityAuth__right">
                                    <div class="color_grey color_grey_14">Ваши данные под защитой и будут использованы только для статистических данных.</div>
                                </div>
                            </div>
                        </div>
                    </x-slot:buttons>
                </x-forms.auth-form>
                </div>
            </div>

            </div>
        </div>
    </div>
    </div>




@endsection
