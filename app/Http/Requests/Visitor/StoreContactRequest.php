<?php

namespace App\Http\Requests\Visitor;

use App\Rules\ReCaptcha;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * The contact form is public; everyone may submit it.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for the public contact form.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name'                 => ['required', 'string', 'min:2', 'max:60'],
            'email'                => ['required', 'email', 'max:255'],
            'phone'                => ['nullable', 'string', 'max:30'],
            'comments'             => ['required', 'string', 'min:10', 'max:1000'],
            // Required so the token cannot be skipped by omitting the field.
            'g-recaptcha-response' => ['required', new ReCaptcha()],
        ];
    }
}
