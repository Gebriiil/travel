<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourGallaryRequest extends FormRequest
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
               
                    'img_title' => 'nullable|string|max:190',
                    'img_alt' => 'nullable|string|max:190',
                    
                ];


                break;


            //  editing data 
            case 'PUT':

                return [
                    'id' => 'required|exists:tour_gallaries,id',
                    'img_title' => 'nullable|string|max:190',
                    'img_alt' => 'nullable|string|max:190',
                
                ];


                break;
        }


    }
}
