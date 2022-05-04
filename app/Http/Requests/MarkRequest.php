<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarkRequest extends FormRequest
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
            'student_id' => 'required',
            'subject_id' => 'required',
            'my_class_id' => 'required',
            'section_id' => 'required',
            'exam_id' => 'required',
            't1' => 'required',
            't2' => 'required',
            't3' => 'required',
            't4' => 'required',
            'tca' => 'required',
            'exm' => 'required',
            'tex1' => 'required',
            'tex2' => 'required',
            'tex3' => 'required',
            'sub_pos' => 'required',
            'cum' => 'required',
            'cum_ave' => 'required',
            'grade_id' => 'required',
            'year' => 'required',
        ];
    }
}
