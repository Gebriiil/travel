<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
                    'email' => 'required|email|unique:subscribers,email',
                    'phone' => 'required|string',
                    'country' => 'required|string',
                    'msg_title' => 'required|string',
                    'msg_body' => 'required|string',
                ];
                break;

        }


    }
}
