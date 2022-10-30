<?php

namespace App\Http\Requests;

use App\Rules\IncidentWindowOpen;
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
                new IncidentWindowOpen(),
            ],
            'session_time' => ['date_format:H:i'],
            'comment' => ['required'],
        ];
    }
}
