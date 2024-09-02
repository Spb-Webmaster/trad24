@extends('layouts.layout')
@section('title', ($seo_title) ?? __('Войти в личный кабинет'))
@section('description', ($seo_description)?? __('Войти в личный кабинет'))
@section('keywords', ($seo_keywords)?? __('Войти в личный кабинет'))
@section('content')
    <div class="auth">
        <div class="block">
            <div class="formLogin__padd">
                <div class="formLogin">
                    <div class="formLogin__wrapp">
                        <div class="formLogin__enter">

                            @include('auth.forms.f-login')

                        </div>
                    </div>
                </div><!--.formLogin-->
            </div>

        </div>
    </div>
@endsection
