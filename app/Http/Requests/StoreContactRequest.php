<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function isCreating(): bool
    {
        return $this->isMethod('POST') && !$this->route('id');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:20'],
            'title' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:225'],
            'url' => ['url', 'nullable'],
            'gender' => ['required', 'boolean'],
            'age' => ['required'],
            'contact' => ['required', 'string', 'max:200'],
        ];

        if ($this->isCreating()) {
            $rules['caution'] = ['required', 'accepted'];
        }

        return $rules;
    }
}
