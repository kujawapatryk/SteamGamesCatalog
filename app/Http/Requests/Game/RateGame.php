<?php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RateGame extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'gameId' => 'required|integer',
            'rate' => 'nullable|integer|min:1|max:100'
        ];
    }

    public function messages(): array
    {
        return [
            'rate.min' => 'Ocena musi być większa bądź równa :min',
            'rate.max' => 'Ocena nie może być większa niż :max',
            'rate.integer' => 'Przekazana wartość musi być liczbą całkowitą'
        ];
    }
}
