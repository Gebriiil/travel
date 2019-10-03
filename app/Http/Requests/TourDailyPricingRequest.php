<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourDailyPricingRequest extends FormRequest
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
                    "tour_id" => "required|exists:tours,id",
                    'title' => 'required|string',
                    'hotels_id' => 'array',
                    'hotels_id.*' => 'required|exists:hotels,id',
                    'first_title' => 'required|string',
                    'second_title' => 'required|string',
                    'third_title' => 'required|string',
                    'fourth_title' => 'required|string',
                    'fifth_title' => 'required|string',
                    'six_title' => 'required|string',
                    'seventh_title' => 'required|string',
                    "first_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "second_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "third_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "fourth_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "fifth_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "six_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "seventh_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                ];
                break;

            //  editing data
            case 'PUT':
                return [
                    "id" => "required|exists:daily_pricings,id",
                    'title' => 'required|string',
                    'hotels_id' => 'array',
                    'hotels_id.*' => 'nullable|exists:hotels,id',
                    'first_title' => 'required|string',
                    'second_title' => 'required|string',
                    'third_title' => 'required|string',
                    'fourth_title' => 'required|string',
                    'fifth_title' => 'required|string',
                    'six_title' => 'required|string',
                    'seventh_title' => 'required|string',
                    "first_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "second_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "third_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "fourth_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "fifth_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "six_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "seventh_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                ];
                break;
        }


    }


}
