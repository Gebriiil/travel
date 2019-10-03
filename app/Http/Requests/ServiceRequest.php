<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
                        'description'       => 'required|string|max:30000',
                        'small_description' => 'required|string|max:15000',
                        'img'               => 'required|image|mimes:png,jpg,jpeg,gif',
                        'cover'               => 'required|image|mimes:png,jpg,jpeg,gif',
                        'slug'              => 'nullable|string|unique:services,slug',
                    ];


                break;


            //  editing data 
            case 'PUT':
                        
                        return [
                        'name'              => 'required|string|max:190',
                        'description'       => 'required|string|max:30000',
                        'small_description' => 'required|string|max:15000',
                        'img'               => 'nullable|image|mimes:png,jpg,jpeg,gif',
                        'cover'               => 'nullable|image|mimes:png,jpg,jpeg,gif',
                        'slug'              => 'nullable|string|unique:services,slug,' . Request('id'),
                    ];


                break;
        }



    }
}
