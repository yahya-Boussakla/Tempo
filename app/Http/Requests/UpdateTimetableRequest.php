<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTimetableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'group_id' => 'sometimes|exists:groupes,id',
            'date_start' => 'sometimes|date',
            'date_end' => 'sometimes|date|after_or_equal:date_start'
        ];
    }
}
