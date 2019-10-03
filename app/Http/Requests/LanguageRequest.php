<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
                        'name'              => 'required|string|max:190|unique:languages,name',
                        'icon'              => 'required|image|mimes:png,jpg,jpeg,gif',
                        'symbol'           => 'required|string|max:150',

                    ];


                break;


            //  editing data 
            case 'PUT':
                        
                        return [
                        'name'              => 'required|string|max:190|unique:languages,name,'.Request('id'),
                        'icon'              => 'nullable|image|mimes:png,jpg,jpeg,gif',
                        'symbol'           => 'required|string|max:150',

                    ];


                break;
        }



    }
}
