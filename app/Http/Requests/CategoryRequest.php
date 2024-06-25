<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Rules\filter;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $id = $this->route('category');
        $category = $id ? Category::findOrFail($id) : null;
        $uniqueNameRule = $category ? "unique:categories,name,$category->name" : 'unique:categories,name';
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                
                // Custom Validation

                // function ($attribute, $value, $fails) {
                //     if (in_array(strtolower($value), ['laravel', 'css', 'blade'])) {
                //         $fails('This name forbidden!');
                //     }
                // },

                // General validation "rule"
                // new filter,

                // General validation "provider"
                // 'filter:laravel,php,css',

                $uniqueNameRule,
            ],
            'image' => 'nullable|mimes:jpg,png',
            'status' => 'in:active,inactive,upcoming',
            'parent_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string|min:5',
        ];
    }
}
