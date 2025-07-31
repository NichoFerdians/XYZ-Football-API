<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreMatchResultRequest extends FormRequest
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
    public function rules()
    {
        return [
            'match_id'    => 'required|exists:match_schedules,id',
            'home_score'  => 'required|integer|min:0',
            'away_score'  => 'required|integer|min:0',
            'goals'       => 'nullable|array',
            'goals.*.player_id' => 'required|exists:players,id',
            'goals.*.minute'    => 'required|integer|min:0|max:120',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation Errors',
            'errors'  => $validator->errors(),
        ], 422));
    }
}
