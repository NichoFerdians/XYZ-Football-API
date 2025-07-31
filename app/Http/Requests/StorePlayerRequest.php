<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StorePlayerRequest extends FormRequest
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
            'team_id'      => 'required|exists:teams,id',
            'name'         => 'required|string',
            'height'       => 'required|integer|min:0',
            'weight'       => 'required|integer|min:0',
            'position'     => ['required',Rule::in(['penyerang','gelandang','bertahan','penjaga gawang'])],
            'jersey_number'=> [
                'required','integer',
                Rule::unique('players')->where(fn($q)=> $q->where('team_id',$this->team_id))
            ],
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
