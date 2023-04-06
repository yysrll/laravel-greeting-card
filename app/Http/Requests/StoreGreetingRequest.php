<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreGreetingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'sender_name' => 'required|max:60',
            'recipient_name' => 'max:60',
            'message' => '',
            'photoUrl' => 'required|max:10000',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(redirect()->back()->with('error', 'Terjadi kesalahan: ' . $validator->errors()));
    }
}
