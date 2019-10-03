<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
                    'tour_id' => 'required|exists:tours,id',
                    'name' => 'required|string|max:190',
                    'email' => 'required|email',
                    'phone' => 'required|string',
                    'nationality' => 'required|string',
                    'arrival_date' => 'required|date|after:today',
                    'departure_date' => 'required|date|after:arrival_date',
                    'adult_number' => 'required|integer',
                    'children_number' => 'required|integer',
                    'message' => 'required|string',
                ];
                break;

        }


    }
}
