<?php

namespace App\Http\Requests;

class StageTwoRequest extends BaseRequest
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
            'x' => 'required|integer',
            'operation_type' => 'required',
            'y' => 'required|integer',
        ];
    }
}
