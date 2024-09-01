<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'student' => ['required'],
            'subject' => ['required'],
            'teacher' => ['required'],
        ];

        return $rules;
    }
}
