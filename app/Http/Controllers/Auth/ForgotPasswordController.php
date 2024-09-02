<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{

    public function page()
    {
        $forgot = false;
        if(session('forgot')) {
            $forgot = true;
            session()->forget('forgot');
        }

        return view('auth.forgot-password', [ 'forgot' => $forgot]);
    }

    public function handle(ForgotPasswordFormRequest $request):RedirectResponse
    {


        $status = Password::sendResetLink(
            $request->only('email')
        );

        /**
         * Событие отправка сообщения опроеделено в моделе User!!!
         */


        if($status === Password::RESET_LINK_SENT) {
            flash()->info(__($status));

            session(['forgot' => 1]);
            return  redirect()->route('forgot');
        }

        return back()->withErrors(['email' => __($status)]);
    }




}
