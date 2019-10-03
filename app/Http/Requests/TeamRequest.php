<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
                    'img' => 'required|image|mimes:png,jpg,jpeg,gif',
                    'img2' => 'nullable|image|mimes:png,jpg,jpeg,gif',
                    'position' => 'required|string|max:190',
                    'email' => 'nullable|string|max:190|email',
                    'facebook' => 'nullable|string|max:190|url',
                    'instgram' => 'nullable|string|max:190|url',
                    'google_plus' => 'nullable|string|max:190|url',
                    'linkedin' => 'nullable|string|max:190|url',
                    'twitter' => 'nullable|string|max:190|url',
                    'describtion' => 'required|string',


                ];


                break;


            //  editing data 
            case 'PUT':

                return [
                    'name' => 'required|string|max:190',
                    'img' => 'nullable|image|mimes:png,jpg,jpeg,gif',
                    'img2' => 'nullable|image|mimes:png,jpg,jpeg,gif',
                    'position' => 'required|string|max:190',
                    'email' => 'nullable|string|max:190|email',
                    'facebook' => 'nullable|string|max:190|url',
                    'instgram' => 'nullable|string|max:190|url',
                    'google_plus' => 'nullable|string|max:190|url',
                    'linkedin' => 'nullable|string|max:190|url',
                    'twitter' => 'nullable|string|max:190|url',
                    'describtion' => 'required|string',

                ];


                break;
        }


    }
}
