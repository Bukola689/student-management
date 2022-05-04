<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRecordRequest extends FormRequest
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
            'exam_id' => 'required',
            'my_class_id' => 'required',
            'section_id' => 'required',
            'total' => 'required',
            'average' => 'required',
            'class_average' => 'required',
            'position' => 'required:unique:position',
            'af' => 'required',
            'ps' => 'required',
            'p_comment' => 'required',
            't_comment' => 'required',
            'year' => 'required',
        ];
    }
}
