<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fio' => 'required|string|max:255',
            'user_email' => 'required|email|unique:users,user_email',
            'user_tz' => 'required|string',
            'user_name' => 'required|string|unique:users,user_name',
            'password' => 'required|string|min:8',
        ];
    }


    /**
     * Get custom validation messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'fio.required' => 'Поле ФИО обязательно для заполнения.',
            'fio.unique' => 'Это ФИО уже используется.',
            'user_email.required' => 'Поле email обязательно для заполнения.',
            'user_email.email' => 'Введите действительный адрес электронной почты.',
            'user_email.unique' => 'Этот email уже используется.',
            'user_tz.required' => 'Поле часового пояса обязательно для заполнения.',
            'user_name.required' => 'Поле имени обязательно для заполнения.',
            'user_name.min' => 'Имя должно содержать не менее 2 символов.',
            'password.required' => 'Поле нового пароля обязательно для заполнения.',
            'password.min' => 'Пароль должен содержать как минимум 8 символов.',
            'password_repeat.required' => 'Поле повторения пароля обязательно для заполнения.',
            'password_repeat.min' => 'Пароль должен содержать как минимум 8 символов.',
            'password_repeat.same' => 'Пароли не совпадают.',
        ];
    }
}

