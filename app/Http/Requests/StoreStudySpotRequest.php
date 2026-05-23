<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudySpotRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'campus_id' => ['required','exists:campuses,id'],
            'building' => ['required','string','max:120'],
            'floor' => ['nullable','string','max:30'],
            'room_area_name' => ['required','string','max:160'],
        ];
    }
}