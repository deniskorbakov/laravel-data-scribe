<?php

declare(strict_types=1);

namespace Tests\Fixtures\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Request;

final class RequestRules extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array

    {
        return [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ];
    }
}
