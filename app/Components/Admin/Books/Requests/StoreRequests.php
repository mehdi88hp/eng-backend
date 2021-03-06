<?php

namespace App\Components\Admin\Books\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequests extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title_fa'=>'required',
            'title_en'=>'required',
            'description_fa'=>'required',
            'description_en'=>'required',
            'author'=>'required',
            'categories'=>'required',
            'publisher'=>'required',
            'cefr_id'=>'required',
            'pages'=>'required',
            'duration'=>'required',
            'release_date'=>'required',
            'image_path'=>'required',
            'image_name'=>'required',
        ];
    }

    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }
}
