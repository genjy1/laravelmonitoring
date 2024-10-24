<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequisitesRequest extends FormRequest
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
            //
            'paymentAccount'=>'required',
            'correspondingAccount'=>'required',
            'BIK'=>'required',
            'bankName'=>'required|string|max:150',
            'INN'=>'required|unique:requisites,INN',
            'user_id'=>'required'
        ];
    }
}
