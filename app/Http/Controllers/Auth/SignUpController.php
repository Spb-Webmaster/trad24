<?php

namespace App\Http\Controllers\Auth;

use App\Events\CreateUserEvent;
use App\Events\MessageAdminCreateUserEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpFormRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;


class SignUpController extends Controller
{

    public function page()
    {
        return view('auth.sign-up');
    }

    public function handle(SignUpFormRequest $request): RedirectResponse
    {


        $user = User::query()->create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)

        ]);

       // event(new Registered($user)); // события
        /**
         * Событие отправка сообщения новому пользователю
         */

        CreateUserEvent::dispatch($request);

        /**
         * Событие отправка сообщения админу
         */

        MessageAdminCreateUserEvent::dispatch($request);


        auth()->login($user); // залогинили

       return redirect()->intended(route('cabinet'));

    }




}
