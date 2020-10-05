<?php

namespace App\Http\Requests;

use App\Rules\PasswordLama;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password_lama' => ['required', new PasswordLama()],
            'password_baru' => ['required','min:6'],
            // 'password_baru' => ['required', 'min:6'],
        ];
    }
}
