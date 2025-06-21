<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cho phép mọi request gọi đến
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
        ];
    }
}

