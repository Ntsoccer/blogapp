<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
        return [
            //
            'title'=>'required|max:100',
            'content'=>'required|max:140',
        ];
    }
    public function messages()
    {
      return[
        'title.max'=>'100文字以内で記入してください。',
        'content.max'=>'140文字以内で記入してください。',
      ];
    }
}