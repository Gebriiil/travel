<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
                        'name'                      => 'required|string|max:190',
                        'email'                     => 'required|email|unique:admins,email',
                        'language_id'               => 'required|numeric|exists:languages,id',
                        'password'                  => 'required|string|min:6',
                        'confirm_password'          => 'required|string|min:6|same:password',

                    ];


                break;


            //  editing data 
            case 'PUT':
                        
                        return [
                        'name'                      => 'required|string|max:190',
                        'email'                     => 'required|email|unique:admins,email,'.Request('id'),
                        'language_id'               => 'required|numeric|exists:languages,id',
                        'password'                  => 'nullable|string|min:6',
                        'confirm_password'          => 'nullable|string|min:6|same:password',
                    ];


                break;
        }



    }
}
