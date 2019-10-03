<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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

            // adding data 
            case 'POST':

                    return [
                        'name'              => 'required|string|max:190',
                        'category_id'       => 'required|numeric|exists:categories,id',
                        'description'       => 'required|string|max:30000',
                        'small_description' => 'required|string|max:15000',
                        'img'               => 'required|image|mimes:png,jpg,jpeg,gif',
                        'slug'              => 'nullable|string|unique:blogs,slug',
                    ];


                break;


            //  editing data 
            case 'PUT':
                        
                        return [
                        'name'              => 'required|string|max:190',
                        'category_id'       => 'required|numeric|exists:categories,id',
                        'description'       => 'required|string|max:30000',
                        'small_description' => 'required|string|max:15000',
                        'img'               => 'nullable|image|mimes:png,jpg,jpeg,gif',
                        'slug'              => 'nullable|string|unique:blogs,slug,' . Request('id'),
                    ];


                break;
        }



    }
}
