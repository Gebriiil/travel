<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':

                return [
                    'name' => 'required|string|max:190',
                    'category_id' => 'required|numeric|exists:categories,id',
                    'small_desc' => 'required|string|max:30000',
                    'desc' => 'required|string|max:30000',
                    'img' => 'required|image|mimes:png,jpg,jpeg,gif',
                    'cover' => 'nullable|image|mimes:png,jpg,jpeg,gif',
                    'img_title' => 'nullable|string|max:190',
                    'img_alt' => 'nullable|string|max:190',
                    'cover_title' => 'nullable|string|max:190',
                    'cover_alt' => 'nullable|string|max:190',
                    'slug' => 'nullable|string|unique:sub_categories,slug',


                ];


                break;

            case 'PUT':

                return [
                    'name' => 'required|string|max:190',
                    'category_id' => 'required|numeric|exists:categories,id',
                    'small_desc' => 'nullable|string|max:30000',
                    'desc' => 'nullable|string|max:30000',
                    'img' => 'nullable|image|mimes:png,jpg,jpeg,gif',
                    'cover' => 'nullable|image|mimes:png,jpg,jpeg,gif',
                    'img_title' => 'nullable|string|max:190',
                    'img_alt' => 'nullable|string|max:190',
                    'cover_title' => 'nullable|string|max:190',
                    'cover_alt' => 'nullable|string|max:190',
                    'slug' => 'nullable|string|unique:sub_categories,slug,' . Request('id'),
                ];


                break;
        }

    }
}
