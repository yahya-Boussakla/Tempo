<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimetableRequest extends FormRequest
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
            'group_id' => 'required|exists:groupes,id',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start'
        ];
    }
}
