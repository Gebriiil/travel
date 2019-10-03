<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourPackagePricingRequest extends FormRequest
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
                    'summer_single_title' => 'required|string',
                    'summer_double_title' => 'required|string',
                    'summer_triple_title' => 'required|string',
                    'winter_single_title' => 'required|string',
                    'winter_double_title' => 'required|string',
                    'winter_triple_title' => 'required|string',
                    "summer_single_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "summer_double_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "summer_triple_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "winter_single_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "winter_double_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "winter_triple_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                ];
                break;

            //  editing data
            case 'PUT':
                return [
                    "id" => "required|exists:package_pricings,id",
                    'title' => 'required|string',
                    'hotels_id' => 'array',
                    'hotels_id.*' => 'required|exists:hotels,id',
                    'summer_single_title' => 'required|string',
                    'summer_double_title' => 'required|string',
                    'summer_triple_title' => 'required|string',
                    'winter_single_title' => 'required|string',
                    'winter_double_title' => 'required|string',
                    'winter_triple_title' => 'required|string',
                    "summer_single_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "summer_double_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "summer_triple_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "winter_single_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "winter_double_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    "winter_triple_price" => "required|regex:/^\d*(\.\d{1,2})?$/",
                ];
                break;
        }


    }


}
