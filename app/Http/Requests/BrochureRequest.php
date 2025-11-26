<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrochureRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns',
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'min:3', 'max:50']
        ];
    }
}
