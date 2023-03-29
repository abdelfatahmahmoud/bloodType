<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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


            'name' => 'required|unique:cities',
            'governorate_id' => 'required|unique:cities',



        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'يجب ادخال البيانات فى هذا الحقل',
            'name.unique:Cities' => 'يجب عدم تكرار اسم الحقل',
            'governorate_id.required' => 'يجب ادخال البيانات فى هذا الحقل',
            'governorate_id.unique:Cities' => 'يجب عدم تكرار اسم الحقل',

        ];
    }
}
