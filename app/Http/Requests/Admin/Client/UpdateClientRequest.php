<?php

namespace App\Http\Requests\Admin\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
    /**
     * Only signed-in admins may update client records.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules for updating a client entry.
     * (Same shape as store, plus the record id; logo optional on update.)
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
                'client_id' => ['required', Rule::exists('client_infos', 'id')],
            ]
            + StoreClientRequest::sharedRules(logo_required: false);
    }
}
