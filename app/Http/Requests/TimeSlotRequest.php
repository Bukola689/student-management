<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeSlotRequest extends FormRequest
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
            'time_table_record_id' => 'required',
            'timestamp_from' => 'required',
            'timestamp_to' => 'required',
            'full' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'hour_from' => 'required',
            'min_from' => 'required',
            'meridian_from' => 'required',
            'hour_to' => 'required',
            'min_to' => 'required',
            'meridian_to' => 'required',
        ];
    }
}
