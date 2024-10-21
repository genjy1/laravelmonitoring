<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function showRegisterView()
    {
        $timezones = \DateTimeZone::listIdentifiers();
        return view('user.register', compact('timezones'));
    }

    public function registerPost (RegisterRequest $request)
    {
        $user = new User();
        $user->fio = $request->input('fio');
        $user->user_email = $request->input('user_email');
        $user->user_tz = $request->input('user_tz');
        $user->user_name = $request->input('user_name');
        $user->password = bcrypt($request->input('password')); // Хешируем пароль

        $user->save(); // Сохраняем пользователя в базе данных

        return redirect()->route('common.home');
    }

    public function loginPost(Request $request)
    {
        $credentials = ['user_name'=>$request->name, 'password'=>$request->password];

//        dd($credentials);
//        dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

    }
    public function logout(Request $request)
    {
        auth()->logout(); // Выход пользователя

        $request->session()->invalidate(); // Инвалидация сессии

        $request->session()->regenerateToken(); // Обновление токена сессии

        return redirect('/'); // Перенаправление на главную страницу или другую нужную страницу
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    public function feedback()
    {
        return view('user.feedback');
    }

    public function sendFeedback(Request $request)
    {
        $data = $request->validate(['theme'=>'required','message'=>'required']);
        $feedback = Feedback::create($data);

        return redirect()->route('common.feedback')->with('success','Ваше сообщение успешно отправлено');
    }
}
