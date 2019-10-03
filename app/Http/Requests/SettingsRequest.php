<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
        switch (Request('setting_type')) {

            // validate base settings ( like -> site name , social links , contacts)
            case 'base':

                return [
                    'site_name' => 'nullable|string|max:190',
                    'email' => 'nullable|email|max:50',
                    'facebook' => 'nullable|url',
                    'instagram' => 'nullable|url',
                    'pinterest' => 'nullable|url',
                    'twitter' => 'nullable|url',
                    'youtube' => 'nullable|url',
                    'trip_advisor' => 'nullable|url',
                    'gmail' => 'nullable|url',
                    'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
                    'fax' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
                    'mobile' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
                    'description' => 'nullable|string|max:3000',
                    'logo' => 'nullable|image|mimes:png,jpg,jpeg,gif||max:5000',
                    'video' => 'nullable|mimes:mp4,mov||max:20000',
                    'logo2' => 'nullable|image|mimes:png,jpg,jpeg,gif||max:5000',
                    'address' => 'nullable|string|max:255',
                    'describtion' => 'nullable|string|max:255',
                    'iframe' => 'nullable',
                    'img_title' => 'nullable|string|max:190',
                    'img_alt' => 'nullable|string|max:190',
                ];


                break;


            //  seo data 
            case 'seo':

                return [
                    'metKeywords' => 'nullable|string|max:3000',
                    'metaTitle' => 'nullable|string|max:3000',
                    'metaAuthor' => 'nullable|string|max:3000',
                ];


                break;
        }


    }
}
