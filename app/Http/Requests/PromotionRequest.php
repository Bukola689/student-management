<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
            'student_record_id' => 'required',
            'from_class_id' => 'required',
            'from_section_id' => 'required',
            'to_class_id' => 'required',
            'to_section_id' => 'required',
            'grade' => 'required',
            'from_session' => 'required',
            'to_session' => 'required',
            'status' => 'required',
        ];
    }
}
