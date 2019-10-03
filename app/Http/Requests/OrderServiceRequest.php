<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderServiceRequest extends FormRequest
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
                    'email' => 'required|email',
                    'phone' => 'required|string',
                    'company' => 'required|string',
                    'service' => 'required|string',
                    'organization_type' => 'required|string',
                ];
                break;

        }


    }
}
