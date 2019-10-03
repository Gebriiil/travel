<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourIteniraryRequest extends FormRequest
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
                    "tour_id" => "nullable|exists:tours,id",
                    'title'              => 'required|string|max:190',
                    'desc'       => 'required|string',
                ];

                break;


            //  editing data
            case 'PUT':

                return [
                    "id" => "required|exists:itineraries,id",
                    'title'              => 'required|string|max:190',
                    'desc'       => 'required|string',
                ];


                break;
        }


    }


}
