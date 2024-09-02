@extends('layouts.layout')
@section('title', ($seo_title) ?? __('Восстановление пароля'))
@section('description', ($seo_description)?? __('Восстановление пароля'))
@section('keywords', ($seo_keywords)?? __('Восстановление пароля'))
@section('content')

    <div class="auth">

        <div class=" block">
            <div class="formLogin__padd">
                <div class="formLogin pageResetPassword">
                    <div class="formLogin__wrapp">
                        <div class="formLogin__enter">

                            <x-forms.auth-form
                                title="{{ __('Восстановление пароля') }}"
                                subtitle="{{ __('Придумайте новый пароль') }}"
                                action="{{ route('password.handle') }}"
                                method="POST"
                            >

                                <input type="hidden" value="{{ $token }}" name="token"/>

                                <div class="text_input">

                                    <x-forms.text-input
                                        type="email"
                                        id="resetEmail"
                                        name="email"
                                        placeholder="E-mail"
                                        value="{{ request('email') }}"
                                        required="true"
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
                                        id="resetPassword"
                                        name="password"
                                        placeholder="Пароль"
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
                                        id="resetPassword_confirmation"
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
                                            {{ __("Обновить пароль") }}
                                        </x-forms.primary-button>
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
