<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudySpotRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'campus_id' => ['sometimes','exists:campuses,id'],
            'building' => ['sometimes','string','max:120'],
            'floor' => ['sometimes','nullable','string','max:30'],
            'room_area_name' => ['sometimes','string','max:160'],
        ];
    }
}