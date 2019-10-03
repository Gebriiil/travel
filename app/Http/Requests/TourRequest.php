<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
                    'sub_category_id' => 'required|exists:sub_categories,id',
                    'small_desc' => 'required|string|max:30000',
                    'desc' => 'required|string',
                    'img' => 'required|image|mimes:png,jpg,jpeg,gif',
                    'cover' => 'required|image|mimes:png,jpg,jpeg,gif',
                    "num_of_days" => "required|integer|min:1",
                    "price_start_from" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    'inclusion' => 'required|string|max:30000',
                    'exclusion' => 'required|string|max:30000',
                    'num_of_stars' => 'required|integer|min:1|max:7',
                    'slug' => 'nullable|string|unique:tours,slug',
                    'img_title' => 'nullable|string|max:190',
                    'img_alt' => 'nullable|string|max:190',
                    'cover_title' => 'nullable|string|max:190',
                    'cover_alt' => 'nullable|string|max:190',
                ];


                break;


            //  editing data 
            case 'PUT':

                return [
                    'name' => 'required|string|max:190',
                    'sub_category_id' => 'nullable|exists:sub_categories,id',
                    'small_desc' => 'required|string|max:30000',
                    'desc' => 'required|string',
                    'img' => 'nullable|image|mimes:png,jpg,jpeg,gif',
                    'cover' => 'nullable|image|mimes:png,jpg,jpeg,gif',
                    "price_start_from" => "required|regex:/^\d*(\.\d{1,2})?$/",
                    'inclusion' => 'required|string|max:30000',
                    'exclusion' => 'required|string|max:30000',
                    "num_of_days" => "nullable|integer|min:1",
                    'num_of_stars' => 'nullable|integer|min:1|max:7',
                    'slug' => 'nullable|string|unique:tours,slug,' . Request('id'),
                    'img_title' => 'nullable|string|max:190',
                    'img_alt' => 'nullable|string|max:190',
                    'cover_title' => 'nullable|string|max:190',
                    'cover_alt' => 'nullable|string|max:190',
                ];


                break;
        }


    }
}
