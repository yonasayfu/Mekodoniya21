<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'name' => 'required|string|max:255',
            'category' => 'required|in:Wedding,Birthday,Death Rember,Graduations,Nika',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
            'facility_id' => 'required|exists:facilities,id',
            'staff_id' => 'required|exists:staff,id',
            'catering_id' => 'required|exists:caterings,id',
            'custom_requirements' => 'nullable|string',
        ];
    }
}
