<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateMatchScheduleRequest extends FormRequest
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
            'match_date'    => 'sometimes|date',
            'match_time'    => 'sometimes|date_format:H:i',
            'home_team_id'  => 'sometimes|exists:teams,id|different:away_team_id',
            'away_team_id'  => 'sometimes|exists:teams,id|different:home_team_id',
        ];
    }

    public function messages()
    {
        return [
            'home_team_id.different' => 'Tim tuan rumah harus berbeda dengan tim tamu.',
            'away_team_id.different' => 'Tim tamu harus berbeda dengan tim tuan rumah.',
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
