<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserBetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|integer',
            'coin' => 'required|integer|in:10,20,50,100,200,500',
            'dice_value' => 'required|integer|in:0,1,2,3,4,5'
        ];
    }
}
