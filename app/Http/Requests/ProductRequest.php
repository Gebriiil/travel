<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        switch ($this->method()) 
        {
            case 'POST':

                    return [
                        'name'              => 'required|string|max:190',
                        'category_id'       => 'required|numeric|exists:categories,id',
                        'small_description' => 'required|string|max:15000',
                        'description'       => 'required|string|max:50000',
                        'img'               => 'required|image|mimes:png,jpg,jpeg,gif',
                        'slug'              => 'nullable|string|unique:products,slug',
                        'price'             => 'required|numeric|digits_between:1,6',
                        'show_in_homePage'  => 'required|string|in:yes,no'


                    ];


                break;
            
            case 'PUT':
                        
                        return [
                        'name'              => 'required|string|max:190',
                        'category_id'       => 'required|numeric|exists:categories,id',
                        'small_description' => 'required|string|max:15000',
                        'description'       => 'required|string|max:50000',
                        'img'               => 'nullable|image|mimes:png,jpg,jpeg,gif',
                        'slug'              => 'nullable|string|unique:products,slug,' . Request('id'),
                        'price'             => 'required|numeric|digits_between:1,6',
                        'show_in_homePage'  => 'required|string|in:yes,no'
                    ];


                break;
        }
        
    }
}
