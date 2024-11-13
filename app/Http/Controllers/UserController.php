<?php

namespace App\Http\Controllers;

use App\Events\FeedbackSent;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\SendFeedback;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Jobs\SendFeedbackJob;
use Illuminate\Support\Str;
use App\Jobs\SendRegistrationConfirmationJob;

class UserController extends Controller
{
    #[Middleware('admin')]
    public function getName()
    {
        $data = DB::select('SELECT * FROM requisites')->get();

        dd($data);

   }
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
        $user->email_verification_token = Str::random(40);

        $user->save(); // Сохраняем пользователя в базе данных

        SendRegistrationConfirmationJob::dispatch($user);

        return redirect()->route('common.home',$user->id);
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('user_name', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['token' => $token]);

    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        Auth::guard('sanctum')->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json(['message' => 'Выход выполнен успешно']);
    }

    public function edit($id)
    {
        $timezones = \DateTimeZone::listIdentifiers();
        $user = User::find($id);

        return view('user.edit', compact('user','timezones'));
    }

    public function editRequisites($id)
    {
        $user = User::find($id);

        return view('user.requisites', compact('user'));
    }

    public function feedback()
    {
        return view('user.feedback');
    }

    public function sendFeedback(Request $request)
    {
        // Validate the incoming data
        $data = $request->validate([
            'theme' => 'required|max:50',
            'message' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        // Create the feedback entry in the database
        $feedback = Feedback::create($data);

        // Find the user who sent the feedback
        $user = User::find($data['user_id']);

        // Отправка письма через очередь
        SendFeedbackJob::dispatch($data);

        // Return a JSON response with a success message
        return response()->json([
            'success' => true,
            'message' => 'Ваше сообщение успешно отправлено'
        ], 200);
    }



    public function getFeedbackWithNames()
    {
        $feedbacks = DB::table('users')
            ->leftJoin('feedback', 'users.id', '=', 'feedback.user_id')
            ->select('users.id', 'users.user_name', 'users.user_email', 'feedback.message')
            ->get();

        return view('debug.feedback',compact('feedbacks'));
    }

    public function changeUserName(Request $request, $id)
    {
        $data = $request->only('user_name');

        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->update($data);

        return response()->json(['message' => 'Username updated successfully', 'user' => $user], 200);
    }

    public function changeEmail(Request $request, $id)
    {
        $data = $request->only('user_email');

        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->update($data);

        return response()->json(['message' => 'Email updated successfully', 'user' => $user], 200);
    }

    public function changeRole(Request $request, $id)
    {
        $data = $request->only('role');

        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->update($data);

        return response()->json(['message' => 'Role updated successfully', 'user' => $user], 200);
    }

    public function changeFio(Request $request, $id)
    {
        $data = $request->only('fio');

        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->update($data);

        return response()->json(['message' => 'FIO updated successfully', 'user' => $user], 200);
    }


    public function forgotPassword()
    {
        return view('user.forgotPassword');
    }

    public function forgotPasswordPost(Request $request)
    {
        $requestData = $request->only('name');
        $user = DB::table('users')->where('user_name', $requestData)->first();

        if (!$user) {
            return response('Пользователя с таким именем не нашлось', 404);
        }

        // Отправляем письмо
        Mail::to($user->user_email)->send(new WelcomeMail($user));

        // Возвращаем сообщение об успешной отправке
        return redirect()->route('forgot-password')->with('success','Письмо успешно отправлено');

    }

    public function changePassword(Request $request, $id)
    {
        // Валидация пароля
        $request->validate([
            'password' => 'required|min:8', // Можно настроить минимальную длину пароля
        ]);

        // Находим пользователя по его ID
        $user = User::find($id);

        // Если пользователь не найден, возвращаем ошибку
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Захешируем новый пароль
        $user->password = Hash::make($request->password);

        // Сохраняем обновленный пароль
        $user->save();

        // Ответ успешного обновления
        return response()->json(['message' => 'Пароль успешно обновлен'], 200);
    }

    public function changeTz(Request $request, $id)
    {
        // Валидация временной зоны
        $request->validate([
            'user_tz' => 'required|string',
        ]);

        // Находим пользователя по его ID
        $user = User::find($id);

        // Если пользователь не найден, возвращаем ошибку
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Обновляем временную зону
        $user->user_tz = $request->user_tz;

        // Сохраняем обновленную временную зону
        $user->save();

        // Ответ успешного обновления
        return response()->json(['message' => 'Временная зона успешно обновлена'], 200);
    }


    public function confirm($token)
    {
        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            return redirect()->route('home')->with('error', 'Invalid token.');
        }

        // Подтверждаем регистрацию
        $user->email_verified_at = now();
        $user->email_verification_token = null;
        $user->save();

        return redirect()->route('home')->with('status', 'Your email has been confirmed!');
    }

}
