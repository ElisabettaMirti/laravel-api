<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => ["required", "string", "min:4", "max:255", Rule::unique("projects")->ignore($this->route("project"))],
            "prog_langs" => ["required"],
            "due_to" => [],
            "url" => ["url", "min:3", "max:255"],
            "type_id" => ["required", "integer", "exists:types,id"],
            "technologies" => ["required","array", "exists:technologies,id"],
        ];
    }
}
