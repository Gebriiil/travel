<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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

            // adding data 
            case 'POST':

                return [
                    'name' => 'required|string|max:190',
                    'country_id' => 'required|exists:countries,id',

                ];


                break;


            //  editing data 
            case 'PUT':

                return [
                    'name' => 'required|string|max:190',
                    'country_id' => 'nullable|exists:countries,id',
                ];


                break;
        }


    }
}
