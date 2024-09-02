<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInFormRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\RedirectResponse;
use MoonShine\Models\MoonshineUser;


class SignInController extends Controller
{

    public function page()
    {

        return view('auth.login');
    }

    public function handle(SignInFormRequest $request): RedirectResponse
    {


        if (!auth()->attempt($request->validated()))
        {

            return back()->withErrors([
                'email' => 'Ошибка в поле E-mail или пароль',
            ])->onlyInput('email');
        }


      //  flash()->info('test');
        $request->session()->regenerate();
        return redirect()->intended(route('cabinet')); // intended - назад или route
    }




}
