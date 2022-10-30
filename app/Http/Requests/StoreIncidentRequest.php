<?php

namespace App\Http\Requests;

use App\Rules\RaceIsProtestable;
use Illuminate\Foundation\Http\FormRequest;

class StoreIncidentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'session_time' => 'The time format must be MM:SS',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'race_id' => [
                'required',
                'exists:races,id',
                new RaceIsProtestable(),
            ],
            'user_id' => ['required', 'exists:users,id'],
            'session_time' => ['required', 'regex:/^\d+\:\d{2}$/'],
            'comment' => ['required'],
        ];
    }
}
