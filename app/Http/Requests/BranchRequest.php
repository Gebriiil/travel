<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
                        'description'       => 'nullable|string|max:30000',
                        'small_description' => 'required|string|max:15000',
                        'img'               => 'nullable|image|mimes:png,jpg,jpeg,gif',
                        'show_in_footer'    => 'required|string|in:yes,no',
                        'phone'             => 'nullable|numeric',
                        'email'             => 'nullable|email|max:190',
                        'code'              => 'nullable|string|max:190',
                        'address'           => 'required|string|max:3000',
                        'map'               => 'nullable|string|max:5000',
                        'slug'              => 'nullable|string|unique:branches,slug',


                    ];


                break;


            //  editing data 
            case 'PUT':
                        
                        return [
                        'name'              => 'required|string|max:190',
                        'description'       => 'nullable|string|max:30000',
                        'small_description' => 'required|string|max:15000',
                        'img'               => 'nullable|image|mimes:png,jpg,jpeg,gif',
                        'show_in_footer'    => 'required|string|in:yes,no',
                        'phone'             => 'nullable|numeric',
                        'email'             => 'nullable|email|max:190',
                        'code'              => 'nullable|string|max:190',
                        'address'           => 'required|string|max:3000',
                        'map'               => 'nullable|string|max:5000',
                        'slug'              => 'nullable|string|unique:branches,slug,' . Request('id'),
                    ];


                break;
        }



    }
}
