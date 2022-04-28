<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'title'=> 'required|max:255',
            'thumbnail' => 'image',
            'start_time'=> 'required|max:255',
            'end_time'=> 'required|max:255',
            'start_date'=> 'required|max:255|date',
            'end_date'=> 'required|max:255|date',
            // 'capacity'=> 'required|max:255',
        ];
    }
}
