<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
                Rule::exists('races', 'id')->where(function ($query) {
                    return $query->where('date', '<', now())
                        ->where('date', '>', now()->subDays(2));
                }),
            ],
            'session_time' => ['date_format:H:i'],
            'comment' => ['required'],
        ];
    }
}
