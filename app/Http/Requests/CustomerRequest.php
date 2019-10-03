<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
                        'service_id'        => 'required|numeric|exists:services,id',
                        'type'              => 'required|string|in:seo,web',
                        'description'       => 'required|string|max:3000',
                        'img'               => 'required|image|mimes:png,jpg,jpeg,gif',
                        'link'              => 'nullable|url',


                    ];


                break;


            //  editing data 
            case 'PUT':
                        
                        return [
                        'name'              => 'required|string|max:190',
                        'service_id'        => 'required|numeric|exists:services,id',
                        'type'              => 'required|string|in:seo,web',
                        'description'       => 'required|string|max:3000',
                        'img'               => 'nullable|image|mimes:png,jpg,jpeg,gif',
                        'link'              => 'nullable|url',

                    ];


                break;
        }



    }
}
