<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Проверяем, что пользователь аутентифицирован и является администратором
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Если пользователь администратор, продолжаем запрос
        }

        return redirect('/'); // Иначе редирект на главную страницу
    }
}

