<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionStaticPageRequest extends FormRequest
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
                        'page_id'           => 'required|numeric|exists:static_pages,id',
                        'question'          => 'required|string|max:190',
                        'answer'            => 'required|string|max:190',
                    ];


                break;


            //  editing data 
            case 'PUT':
                        
                        return [

                        'page_id'           => 'required|numeric|exists:static_pages,id',
                        'question_id'       => 'required|numeric|exists:question_static_pages,id',
                        'question'          => 'required|string|max:190',
                        'answer'            => 'required|string|max:190',

                    ];


                break;
        }



    }
}
