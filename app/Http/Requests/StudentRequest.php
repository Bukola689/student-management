<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'user_id' => 'required',
            'my_classid' => 'required',
            'section_id' => 'required',
            'adm_no' => 'required',
            'parent_id' => 'required',
            'dorm_id' => 'required',
            'dorm_room_no' => 'required',
            'sessiom' => 'required',
            'house' => 'required',
            'age' => 'required|unique:age|min:13|max:20',
            'year_admitted' => 'required',
            'grad' => 'required',
            'grad_date' => 'required',
        ];
    }
}
