@extends('layouts.layout')
@section('title', ($seo_title) ?? __('Забыли пароль'))
@section('description', ($seo_description)?? __('Забыли пароль'))
@section('keywords', ($seo_keywords)?? __('Забыли пароль'))
@section('content')

    <div class="auth">

        <div class=" block">
            <div class="formLogin__padd">
                <div class="formLogin pageForgot">
                    <div class="formLogin__wrapp">
                        <div class="formLogin__enter">
                            @if(!$forgot)

                                <x-forms.auth-form
                                    title="{{ __('Забыли пароль') }}"
                                    subtitle="{{  __('Введите почту с которым зарегистрировались на сайте') }}"
                                    action="{{ route('forgot.handel') }}"
                                    method="POST"
                                >
                                    <div class="text_input">

                                        <x-forms.text-input
                                            type="email"
                                            id="forgotEmail"
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

                                    <x-slot:buttons>
                                        <div class="slotButtons">

                                            <x-forms.primary-button>
                                                {{  __('Отправить') }}
                                            </x-forms.primary-button>

                                            <div class="slotButtonsCenter login_back text_center"><a
                                                    href="{{ route('login') }}"
                                                    class="">Вспомнил
                                                    пароль</a></div>

                                        </div>

                                    </x-slot:buttons>
                                </x-forms.auth-form>

                            @else
                                <x-forms.auth-Noform-forgot
                                    title="{{ __('Забыли пароль') }}"
                                    subtitle="{{  __('Для продолжение восстановления проверьте Вашу электронную почту, указанную при регистрации.') }}"
                                />
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
